<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'cuenta' => 'required|max:255|unique:users',
			'password' => 'required|min:6',
			'carrera' => 'required',	
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user =  User::create([
			'name' => $data['name'],
			'cuenta' => $data['cuenta'],
			'password' => $data['password'],
		]);

		$user->carreras()->attach($data['carrera']);

		return $user;
	}

}
