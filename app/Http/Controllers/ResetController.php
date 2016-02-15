<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Carrera;
use App\User;

use Illuminate\Http\Request;

class ResetController extends Controller {

	


	public function reset()
	{

		$user = Auth::user();

		return view('reset', compact('user'));
	}



	public function resetC($id, Request $request)
   {
      $user = User::find($id);

      $user->update($request->all());

      flash()->overlay('ha cambiado su contraseña exitosamente', 'El usuario '. $user->name);

      return redirect('/home');
   }

}
