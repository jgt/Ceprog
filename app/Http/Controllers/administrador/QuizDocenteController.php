<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\ExamenDocenteRepository;
use App\Repository\MateriaRepository;
use App\Repository\CarreraRepository;
use App\Administrador\EvaluacionMaestro\RespuestaDocente;
use App\Administrador\EvaluacionMaestro\ResultadoDocente;
use Auth;
use App;
use Carbon\Carbon;

class QuizDocenteController extends Controller
{
    private $examenDocente;
    private $materiaRepository;
    private $carreraRepository;

    public function __construct(

        ExamenDocenteRepository $examenDocente,
        MateriaRepository $materiaRepository,
        CarreraRepository $carreraRepository)
    {
        $this->examenDocente = $examenDocente;
        $this->materiaRepository = $materiaRepository;
        $this->carreraRepository = $carreraRepository;
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $examen = $this->materiaRepository->listExamen($id);

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
        //
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
        //
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

    public function examenPreguntas($id, $materia)
    {   

        $preguntas = $this->examenDocente->listaPreguntas($id, $materia);
        return Response()->json($preguntas);
    }

    public function respDocente($id, Request $request)
    {   
        $examen = $this->examenDocente->search($id);
        $respuesta = RespuestaDocente::create([

                'pregunta_docente_id' => $request->get('pregunta_docente_id'),
                'posible_respuesta_id' => $request->get('posible_respuesta_id'),
                'materia_id' => $request->get('materia_id'),
                'user_id' => Auth::user()->id

            ]);

        return Response()->json($examen);
    }

    public function endQuiz(Request $request)
    {
        $this->validate($request, [

            'user_id' => 'required',
            'examen_docente_id' => 'required',
            'materia_id' => 'required',
            ]);

        $resultado = ResultadoDocente::create($request->all());
        $materia = $resultado->materia;

        return Response()->json($materia);
    }

    public function alumnoReportePdf($id, Request $request)
    {
        $materia = $this->materiaRepository->search($id);
        $user = Auth::user();
        $pdf = App::make('dompdf.wrapper'); 
        $fecha = Carbon::now();
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('almReporteEncuesta', compact('materia', 'fecha', 'user'));
        return $pdf->stream();
    }

}
