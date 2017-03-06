<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\ExamenDocenteRepository;
use App\Repository\MateriaRepository;
use App\Repository\UserRepository;
use App\Repository\CarreraRepository;
use App\Repository\CampusRepository;
use App\Http\Requests\Docente;
use App\Http\Requests\PreguntaMaestro;
use App\Http\Requests\RespuestaMaestro;
use App\Administrador\EvaluacionMaestro\Rango;
use App\Administrador\EvaluacionMaestro\PreguntaDocente;
use App\Administrador\EvaluacionMaestro\PosibleRespuesta;
use App\Administrador\EvaluacionMaestro\ExamenDocente;
use App;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ExamenDocenteController extends Controller
{
    
    private $examenDocente;
    private $materiaRepository;
    private $userRepository;
    private $carreraRepository;
    private $campusRepository;
    
    public function __construct(
        ExamenDocenteRepository $examenDocente,
        MateriaRepository $materiaRepository,
        UserRepository $userRepository,
        CarreraRepository $carreraRepository,
        CampusRepository $campusRepository)
    {
        $this->examenDocente = $examenDocente;
        $this->materiaRepository = $materiaRepository;
        $this->userRepository = $userRepository;
        $this->carreraRepository = $carreraRepository;
        $this->campusRepository = $campusRepository;
    }

    public function index()
    {
        $rangos = Rango::all();
        return Response()->json($rangos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $carreras = $this->carreraRepository->getModel()->with('semestres.materias')->get();
        return Response()->json($carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Docente $request)
    {
        
        $examen = $this->examenDocente->crearExamen($request);
        return Response()->json($examen);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examen = $this->examenDocente->search($id)->with('preguntas')->get();

        return Response()->json($examen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examen = ExamenDocente::find($id)->where('id', $id)->with('carreras')->get();
        $carreras = $this->carreraRepository->getModel()->all();

        $detalles = [

                'examen' => $examen,
                'carrera' => $carreras
        ];
        return Response()->json($detalles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $examen = $this->examenDocente->search($id);
        $examen->update($request->all());
        $examen->carreras()->sync($request->get('carrera_list'));
        return Response()->json($examen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createPregunta(PreguntaMaestro $request)
    {
        $pregunta = PreguntaDocente::create($request->all());
        return Response()->json($pregunta);
    }

    public function createRespuesta(RespuestaMaestro $request)
    {

        $name= $request->input('name');
        $valor= $request->input('valor');
        $pregunta_id= $request->input('pregunta_docente_id');

        foreach ($name as $key => $n) {
 
            $ins = new PosibleRespuesta;
            $ins->pregunta_docente_id = $pregunta_id;
            $ins->name = $name[$key];
            $ins->valor = $valor[$key];           
            $ins->save();

        }

        return Response()->json($ins);
    }

    public function listexaDocente(Request $request)
    {
        $examenes = $this->examenDocente->listaExamenes();
        return Response()->json($examenes);
    }

    public function updatePregunta($id)
    {
        $preguntas = $this->examenDocente->search($id)->with('preguntas')->get();
        $rangos = Rango::all();

        $detalles = ['numeroPreguntas' => $preguntas, 'rangos' => $rangos];

        return Response()->json($detalles);
    }

    public function borrarExamenDocente($id)
    {
        $examen = $this->examenDocente->search($id);
        $examen->delete();
    }

    public function editarPregunta($id)
    {
        $pregunta = PreguntaDocente::where('id', $id)->with('rango')->get();
        
        return Response()->json($pregunta);
    }

    public function actualizarPregunta($id, Request $request)
    {
        $pregunta = PreguntaDocente::find($id);
        $pregunta->update($request->all());
        return Response()->json($pregunta);
    }

    public function borrarPreguntaDocente($id)
    {
        $pregunta = PreguntaDocente::find($id);
        $pregunta->delete();

    }

    public function listMateias()
    {
        $materias = $this->materiaRepository->getModel()->has('resultados')->with('semestre.carrera')->get();

        return Response()->json($materias);
    }

    public function resporteExamenDocente($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $materia = $this->materiaRepository->search($id); 
        $fecha = Carbon::now();
        $rangos = Rango::all();
        $reporte = $this->materiaRepository->reporteDocente($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('rptDocente', compact('materia', 'fecha', 'rangos', 'reporte'));
        return $pdf->stream();

    }

    public function examenDocentePdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $examen = $this->examenDocente->search($id); 
        $fecha = Carbon::now();
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('examenDocentePdf', compact('examen', 'fecha'));
        return $pdf->stream();

    }

    public function reporteGeneral()
    {

        $pdf = App::make('dompdf.wrapper');
        $fecha = Carbon::now();
        $rangos = Rango::all(); 
        $materias = $this->materiaRepository->materiasResultados();
        $suma = $this->materiaRepository->sumaValor();
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape'; 
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('reporteGeneralDoc', compact('materias', 'fecha', 'rangos', 'suma'));
        return $pdf->stream();
    }
    
    
    public function reporteCampus($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $fecha = Carbon::now();
        $rangos = Rango::all(); 
        $materias = $this->campusRepository->materiaCampus($id);
        $suma = $this->materiaRepository->sumaValor();
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape'; 
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('reporteCampus', compact('materias', 'fecha', 'rangos', 'suma'));
        return $pdf->stream();
    }
}
