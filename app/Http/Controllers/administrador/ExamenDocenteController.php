<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\ExamenDocenteRepository;
use App\Repository\MateriaRepository;
use App\Http\Requests\Docente;
use App\Http\Requests\PreguntaMaestro;
use App\Http\Requests\RespuestaMaestro;
use App\Administrador\EvaluacionMaestro\Rango;
use App\Administrador\EvaluacionMaestro\PreguntaDocente;
use App\Administrador\EvaluacionMaestro\PosibleRespuesta;

class ExamenDocenteController extends Controller
{
    
    private $examenDocente;
    private $materiaRepository;
    
    public function __construct(
        ExamenDocenteRepository $examenDocente,
        MateriaRepository $materiaRepository)
    {
        $this->examenDocente = $examenDocente;
        $this->materiaRepository = $materiaRepository;
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

        $materias = $this->materiaRepository->getModel()->with('users', 'semestre.carrera')->get();
        return Response()->json($materias);
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
        //
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

    public function createPregunta(PreguntaMaestro $request)
    {
        $pregunta = PreguntaDocente::create($request->all());
        return Response()->json($pregunta);
    }

    public function createRespuesta(RespuestaMaestro $request)
    {

        $name= $request->input('name');
        $estado= $request->input('estado');
        $pregunta_id= $request->input('pregunta_docente_id');

        foreach ($name as $key => $n) {
 
            $ins = new PosibleRespuesta;
            $ins->pregunta_docente_id = $pregunta_id;
            $ins->name = $name[$key];           
            $ins->estado = ($key == $estado);
            $ins->save();

        }

        return Response()->json($ins);
    }
}
