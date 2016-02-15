<?php namespace App\Contract;



class adminInterface {



	public function index(Request $request);


	public function create();


	public function store();


	public function show($id);


	public function edit($id);


	public function update($id);


	public function delete($id);


}



