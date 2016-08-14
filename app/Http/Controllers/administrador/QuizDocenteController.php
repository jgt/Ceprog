<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\ExamenDocenteRepository;
use App\Repository\MateriaRepository;
use App\Administrador\EvaluacionMaestro\RespuestaDocente;
use App\Administrador\EvaluacionMaestro\ResultadoDocente;
use Auth;

class QuizDocenteController extends Controller
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

    public function examenPreguntas($id)
    {
        $preguntas = $this->examenDocente->listaPreguntas($id);
        return Response()->json($preguntas);
    }

    public function respDocente($id, Request $request)
    {   
        $examen = $this->examenDocente->search($id);
        $respuesta = RespuestaDocente::create([

                'pregunta_docente_id' => $request->get('pregunta_docente_id'),
                'posible_respuesta_id' => $request->get('posible_respuesta_id'),
                'user_id' => Auth::user()->id

            ]);

        return Response()->json($examen);
    }

    public function endQuiz(Request $request)
    {
        $this->validate($request, [

            'user_id' => 'required',
            'examen_docente_id' => 'required',
            'resultado' => 'required'
            ]);

        $resultado = ResultadoDocente::create($request->all());
        return Response()->json($resultado);
    }
}
