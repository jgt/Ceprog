<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class InscripcionController extends Controller {

	


	public function index(){

		return view('inscripciononline');
	}

	public function create() 
	{

		return view('resolicitud');
	}

}
