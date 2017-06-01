<?php

namespace App\Http\Controllers\ExamenDiagnostico;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Evadigs;
use App\Http\Requests\Quist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Carrera;
use App\Administrador\EvaluacionDiagnostico\Evadig;
use App\Administrador\EvaluacionDiagnostico\PreguntaDiag;
use App\Administrador\EvaluacionDiagnostico\Area;
use App\Administrador\EvaluacionDiagnostico\RespuestaDiagnostico;
use App\Administrador\EvaluacionDiagnostico\Evaposresp;
use App\Administrador\EvaluacionDiagnostico\ResultadoDiag;
use Auth;
use Datatables;
use App;
use Carbon\Carbon;


class ExamenDiagController extends Controller
{


    public function index()
    {
        $examenes = Evadig::with('preguntas', 'carreras')->select('evadigs.*');
        return Datatables::of($examenes)->make(true);
    }

    public function indexAlumnos($id)
    {
        $carrera = Carrera::find($id);
        $examenes = $carrera->evaDigs()->get();
        return response()->json($examenes);
    }

    public function realizarExamen($id)
    {

        $examen = Evadig::find($id);
        $preguntas = PreguntaDiag::where('evadig_id',$id)->with('area')->orderBy('contador', 'asc')->get();
        $preguntaNext= [];
        $nota =0;

        foreach ($preguntas as  $pregunta) {
                //comprobamos si las preguntas ya fueron contestadas por el alumno.
            $repuestaUser = RespuestaDiagnostico::where('pregunta_diag_id', $pregunta->id)->where('user_id',Auth::user()->id)->count();
            // me traigo todas las respuestas correctas
             $respuestas = Evaposresp::where('pregunta_diag_id',$pregunta->id)->where('estado',1)->get();
            
             foreach ( $respuestas as $respuesta) {
              $correcta = RespuestaDiagnostico::where('evaposresp_id',$respuesta->id)->where('user_id',Auth::user()->id)->count();
              
              if($correcta==1):
                        $nota += $pregunta->valor;
                endif;

          }
         
              //enviamos todas las preguntas que no han sido contestadas
                if(! $repuestaUser):

                    $preguntaNext = PreguntaDiag::where('id', $pregunta->id)->with('posibleResp', 'area')->orderBy('contador', 'asc')->get();

                endif;
            }

            $detalles = ['pregunta' => $preguntaNext, 'nota' => $nota];

            return response()->json($detalles);

    }

    public function nextQuestion($id, Request $request)
    {

      $examen = Evadig::find($id);
      $respuesta = RespuestaDiagnostico::create([

            'pregunta_diag_id' => $request->get('preg_id'),
            'evaposresp_id' => $request->get('respeva'),
            'user_id' => Auth::user()->id

        ]);
    
        return response()->json($respuesta);
    }

    public function terminarExamen($id, Request $request)
    {
            
        $this->validate($request, [

            'user_id' => 'required',
            'evadig_id' => 'required',
            'resultado' => 'required'


            ]);

        $resultado = ResultadoDiag::create($request->all());
        return response()->json($resultado);

    }
    
    public function store(Request $request)
    {
        $this->validate($request, [

                'name' => 'required',
                'modalidad' => 'required',
                'modulo' => 'required',
                'fecha' => 'required',
                'fechaF' => 'required',

            ]);

        $eva = Evadig::create($request->all());
        $eva->carreras()->attach($request->input('carrera_list'));
        return response()->json($eva);
    }

    public function areas()
    {
        $area = Area::get();
        return response()->json($area);
    }

    public function carreras()
    {
        $carreras = Carrera::get();
        return response()->json($carreras);
    }

    public function createPregunta(Request $request)
    {

        $dir = public_path().'/diagnostico';
        $file = $request->file('imagen');
    
        if($file)
        {   
            $nombre = $file->getClientOriginalName();
            $ruta = $file->move($dir, $nombre);
            
            $pregunta = PreguntaDiag::create([

            'contador' => $request->input('contador'),
            'contenido' => $request->input('contenido'),
            'valor' => $request->input('valor'),
            'imagen' => $nombre,
            'evadig_id' => $request->input('evaDid'),
            'area_id' => $request->input('area_id')

            ]);

        }else{

            $pregunta = PreguntaDiag::create([

            'contador' => $request->input('contador'),
            'contenido' => $request->input('contenido'),
            'valor' => $request->input('valor'),
            'evadig_id' => $request->input('evaDid'),
            'area_id' => $request->input('area_id')

            ]);

        }

        return response()->json($pregunta);
    }

    public function createRespuesta(Quist $request)
    {
       
        $name= $request->input('name');
        $estado= $request->input('estado');
        $pregunta_id = $request->input('pregunta_id');

        foreach ($name as $key => $n) {
 
            $ins = new Evaposresp;
            $ins->pregunta_diag_id = $pregunta_id;
            $ins->name= $name[$key];           
            $ins->estado = ($key == $estado);
            $ins->save();

        }

        return response()->json($ins);
    }

    public function updateEva($id, Request $request)
    {
        $examen = Evadig::find($id);
        $examen->update($request->all());
        $examen->carreras()->sync($request->get('carrera_list'));
        return Response()->json($examen);
    }

    public function evaPdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $examen = Evadig::find($id);
        $fecha = Carbon::now();
        $customPaper = array(0,0,950,950);
        $paper_orientation = 'landscape';
        $pdf->setPaper($customPaper,$paper_orientation);
        $pdf->loadview('evaPdf', compact('examen', 'fecha'));
        return $pdf->stream();

    }

    public function borrarEva($id)
    {
        $examen = Evadig::find($id);
        $examen->delete();
    }

    public function deletePregunta($id)
    {
        $pregunta = PreguntaDiag::find($id);
        $pregunta->delete();
    }
}
