<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Grupo;
use Bican\Roles\Models\Role;
use App\User;
use Input;

use Illuminate\Http\Request;

class RoleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$roles = Role::get();
		return response()->json($roles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	

		return view('create.role', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Grupo $request)
	{
		$role = Role::create($request->all());

		flash()->overlay('El grupo ha sido creado', 'El grupo ' . $role->name);

		return redirect('role');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::find($id);

		return view('showrole', compact('role'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::find($id);

		$user = User::lists('name', 'id');

		return view('edit.role', compact('user', 'role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Grupo $request)
	{
		$role = Role::find($id);

		$role->update($request->all());

		$role->users()->sync($request->Input('user_list'));

		flash()->overlay('Ha sido editado', 'El role ' . $role->name);

		return redirect('role');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::find($id);

		$role->delete();

		flash()->overlay('Ha sido borrado', 'El role ' . $role->name);

		return redirect('role');
	}

	public function agregarRole($id, Request $request)
	{
		$user = User::find($id);
		$user->attachRole($request->get('role_list'));
		return response()->json($user);
	}

}
