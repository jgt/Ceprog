<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Quist;
use App\Examen;
use App\Materia;
use App\Pregunta;
use App\Respuesta;
use App\Resultado;
use App\RespuestaUser;
use Auth;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repository\ExamenRepository;

class ExamenController extends Controller
{
    
    private $examenRepository;

    public function __construct(ExamenRepository $examenRepository)
    {

        $this->examenRepository = $examenRepository;
    }



    public function examenPreguntas($id, Request $request)
    {

        $preguntas = $this->examenRepository->getPreguntas($id);

        if($request->ajax())
        {
            return response()->json($preguntas);
        }
    }



    public function createExamen($id, Request $request)
    {
    	$materia = Materia::find($id);

        $detalles = [

                'materia' => Materia::find($id),
                'usuario' => Auth::user()
        ];

        if($request->ajax())
        {

            return response()->json($detalles);

        }
    }

    public function storeExamen(Request $request)
    {	

        
    	$this->validate($request, [


    			'modalidad' => 'required',
    			'modulo' => 'required',
				'catedratico' => 'required',
				'fecha' => 'required',
				'fechaF' => 'required',
				'materia_id' => 'required',



			]);
        
    	$examen = Examen::create($request->all());
 
        if($request->ajax())
        {
            return response()->json($examen);
        }

    }

    public function createPregunta($id)
    {

        $examen = Examen::find($id);
        $preguntas = $examen->preguntas->count();
        return view('examen.createPregunta', compact('examen', 'preguntas'));
    }


    public function storePregunta(Request $request)
    {

        $this->validate($request, [

                'contenido' => 'required',
                'valor' => 'required',
                'examen_id' => 'required',


            ]);

        $pregunta = Pregunta::create($request->all());

        if($request->ajax())
        {
            return response()->json($pregunta);
        }

    }



    public function createRespuesta($id, Request $request){

        $pregunta = Pregunta::find($id);   

        return view('examen.createRespuesta', compact('pregunta'));
    }



    public function storeRespuesta(Quist $request)
    {   

         
        $name= $request->input('name');
        $estado= $request->input('estado');
        $pregunta_id= $request->input('pregunta_id');

        foreach ($name as $key => $n) {
 
            $ins = new Respuesta;
            $ins->pregunta_id = $pregunta_id;
            $ins->name= $name[$key];           
            $ins->estado= ($key == $estado);
            $ins->save();

        }

        if($request->ajax())
        {
            return response()->json($ins);
        }
        
    }

    public function realizarExamen($id, Request $request)
    {

        $examen = Examen::find($id);
        $preguntas = Pregunta::where('examen_id',$id)->orderByRaw('RAND()')->get();
        $preguntaNext= [];
        $nota =0;

        foreach ($preguntas as  $pregunta) {
                //comprobamos si las preguntas ya fueron contestadas por el alumno.
            $repuestaUser = RespuestaUser::where('pregunta_id', $pregunta->id)->where('user_id',Auth::user()->id)->count();
            // me traigo todas las respuestas correctas
             $respuestas = Respuesta::where('pregunta_id',$pregunta->id)->where('estado',1)->get();
            
             foreach ( $respuestas as $respuesta) {
              $correcta = RespuestaUser::where('respuesta_id',$respuesta->id)->where('user_id',Auth::user()->id)->count();
              
              if($correcta==1):
                        $nota += $pregunta->valor;
                endif;

          }
         
              //enviamos todas las preguntas que no han sido contestadas
                if(! $repuestaUser):

                    $preguntaNext = Pregunta::where('id', $pregunta->id)->with('respuestas')->orderByRaw('RAND()')->get();

                endif;
            }

            $detalles = ['pregunta' => $preguntaNext, 'nota' => $nota];

            if($request->ajax())
            {
                return response()->json($detalles);
            }
        //return view('examen.realizarExamen', compact('preguntaNext', 'examen', 'nota'));

    }


    public function resultadoExamen($id, Request $request)
    {

      
      $examen = Examen::find($id);
      $respuesta = RespuestaUser::create([

            'pregunta_id' => $request->get('pregunta_id'),
            'respuesta_id' => $request->get('respuesta'),
            'user_id' => Auth::user()->id

        ]);
    
      if($request->ajax())
      {

        return response()->json($respuesta);
      }
    }

     /**
    * Con esta accion generamos la nota final del
    * examen finalizado de alumno
    **/
   
    public function terminarExamen($id, Request $request)
    {
            
        $this->validate($request, [

            'user_id' => 'required',
            'examen_id' => 'required',
            'resultado' => 'required'


            ]);

         $resultado = Resultado::create($request->all());

         if($request->ajax())
         {
            return response()->json($resultado);
         }

    }


    public function pdfExamen($id)
     {
        
        $pdf = App::make('dompdf.wrapper');
        $resultado = Resultado::find($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('showExamen', compact('resultado'));
        return $pdf->stream();

        
    }

    public function notaExamen($id, Request $request)
    {

        $examen = Examen::find($id)->resultados()->with('user', 'examen')->get();

        if($request->ajax())
        {
            return response()->json($examen);
        }
    }


    public function listPreguntas($id, Request $request)
    {

        $examen = Examen::find($id)->preguntas()->with('respuestas')->paginate(10);

        if($request->ajax())
        {

            return response()->json($examen);
        }


    }


     public function verExamen($id)
     {
        
        $pdf = App::make('dompdf.wrapper');
        $examen = Examen::find($id);
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('showPdfExamen', compact('examen'));
        return $pdf->stream();

        
    }

    public function editarPregunta($id, Request $request)
    {

        $pregunta = Pregunta::find($id);

        if($request->ajax())
        {
            return response()->json($pregunta);
        }

    }

    public function updatePregunta($id, Request $request)
    {   

        $this->validate($request, [

            'contenido' => 'required',
            'examen_id' => 'required',
            'valor' => 'required'


            ]);

        $pregunta = Pregunta::find($id);
        $pregunta->update($request->all());

    }

    public function editRespuesta($id, Request $request)
    {

        $respuestas = Pregunta::find($id)->respuestas()->get();

        if($request->ajax())
        {
            return response()->json($respuestas);
        }

    }

    public function updateRespuesta($id, Request $request)
    {

        $respuestas = Pregunta::find($id)->respuestas()->get();

        foreach ($respuestas as $respuesta) {
            
            $respuesta->update();
        }
    }

    public function editarExamen($id, Request $request)
    {

        $examen = Examen::find($id);
        
        if($request->ajax())
        {
            return response()->json($examen);
        }

    }

    public function updateExamen($id, Request $request)
    {

        $examen = Examen::find($id);
        $examen->update($request->all());

    }



    public function deleteExamen($id, Request $request)
    {

        $examen = Examen::find($id);
        $examen->delete();

    }


    public function deletePregunta($id, Request $request)
    {

        $pregunta = Pregunta::find($id);
        $pregunta->delete();
    }
   
}
