<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MailController extends Controller {

	

public function index()

{
     return view('include.correo');
}

public function show()
{

  return view('include.contacto');

}

public function send(Request $request)
   {
       //guarda el valor de los campos enviados desde el form en un array
       $data = $request->all();
 
       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
       \Mail::send('include.mensaje', $data, function($message) use ($request)
       {

           
          

           //remitente
            $message->from($request->email, $request->name);

          
           //asunto
             $message->subject($request->subject);


            
           //receptor
             $message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));

             
 
       });
       flash()->overlay('Su solicitud ha sido enviada sactifctoriamente', 'Gracias por preferirnos');

       return redirect('/home');
   }

}
