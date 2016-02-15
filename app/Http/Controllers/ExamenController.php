<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Examen;
use App\Materia;
use App\Pregunta;
use App\Respuesta;
use App\Resultado;
use App\RespuestaUser;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExamenController extends Controller
{
    

    public function __construct()
    {

        
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

    	return view('examen.createExamen', compact('materia'));
    }

    public function storeExamen(Request $request)
    {	

        
    	$this->validate($request, [


    			'modalidad' => 'required',
    			'modulo' => 'required',
				'catedratico' => 'required',
				'fecha' => 'required',
				'fechaF' => 'required',
				'hora' => 'required',
				'materia_id' => 'required',



			]);
        
    	$examen = Examen::create($request->all());
 
        if($request->ajax())
        {
            return response()->json($examen);
        }

    	flash()->overlay('Crea las preguntas de tu examen', 'Examen de la materia'. $examen->materia->name);
    	return redirect()->route('examenP', [$examen->id]);

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

        flash()->overlay('Ha sido creada correctamente', 'Preguntas de examen de la materia'. $pregunta->examen->materia->name);

        return redirect()->route('createRespuesta', [$pregunta->id]);

    }



    public function createRespuesta($id, Request $request){

        $pregunta = Pregunta::find($id);   

        return view('examen.createRespuesta', compact('pregunta'));
    }



    public function storeRespuesta(Request $request)
    {

        $validation = $this->validate($request, [

            'name' => 'required',
            'estado' => 'required',
            'pregunta_id' => 'required'


            ]);

       $respuestas = Respuesta::create($request->all());

       return redirect()->back();
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

                    $preguntaNext = Pregunta::where('id', $pregunta->id)->orderByRaw('RAND()')->paginate(1);

                endif;
            }

        return view('examen.realizarExamen', compact('preguntaNext', 'examen', 'nota'));

    }


    public function resultadoExamen($id, Request $request)
    {

      
      $examen = Examen::find($id);
      $respuesta = RespuestaUser::create([

            'pregunta_id' => $request->get('pregunta_id'),
            'respuesta_id' => $request->get('respuesta'),
            'user_id' => Auth::user()->id

        ]);
    
      return redirect()->route('realizarExamen', [$examen]);
    }

     /**
    * Con esta accion generamos la nota final del
    * examen finalizado de alumno
    **/
   
    public function terminarExamen($id, Request $request)
    {
         
         $resultado = Resultado::create($request->all());

         return redirect()->route('menu');

    }


   
}
