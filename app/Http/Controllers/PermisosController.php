<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permiso;
use App\Http\Requests\EditPermiso;
use Bican\Roles\Models\Permission;
use App\User;

use Illuminate\Http\Request;

class PermisosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$permiso = Permission::name($request->get('name'))->paginate(5);

		return view('listapermiso', compact('permiso'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$user = User::lists('name', 'id');

		return view('create.permiso', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Permiso $request)
	{


		$permiso = Permission::create($request->all());

		$permiso->users()->attach($request->input('user'));

		flash()->overlay('Ha sido creado sastifactoriamente', 'El permiso ' .$permiso->name);

		return redirect('permiso');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$permiso = Permission::find($id);

		return view('showpermiso', compact('permiso'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permiso = Permission::find($id);

		$user = User::lists('name', 'id');

		return view('edit.permiso', compact('permiso', 'user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditPermiso $request)
	{
		$permiso = Permission::find($id);

		$permiso->update($request->all());

		$permiso->users()->sync($request->input('user_list'));

		flash()->overlay('Ha sido editado sastifactoriamente', 'El permiso ' . $permiso->name);

		return redirect('permiso');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$permiso = Permission::find($id);

		$permiso->delete();

		flash()->overlay('Ha sido borrado sastifactoriamente', 'El permiso ' . $permiso->name);

		return redirect('permiso');
	}

}
