<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Reinscripcion;
use App;
use Input;

use Illuminate\Http\Request;

class ReinscripcionController extends Controller {

	public function index()
	{

		return view('reinscripcion');
	}

 
	public function store(Reinscripcion $request)
   {
       //guarda el valor de los campos enviados desde el form en un array
       $data = $request->all();
        $fromEmail = $request->get('Correo');
        $fromName = $request->get('Nombres');
 
       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
       \Mail::send('include.reenviar', $data, function($message) use ($request, $fromEmail, $fromName)
       {
           //remitente
           $message->from($fromEmail, $fromName);

 
           //receptor
           $message->to(env('CONTACT_CEPROG'), env('CONTACT_UC'));
 
       });
        flash()->overlay('Su solicitud ha sido enviada sactifctoriamente', 'Gracias por preferirnos');

       return back();
   }

}
