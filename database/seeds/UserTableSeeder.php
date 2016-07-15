<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator;
use Styde\Seeder\Seeder as prueba;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

   
   protected $total = 50;

    public function getModel()
    {
        return new User();
    }

    public function run()
    {

    	User::create([

    		'name' => 'Jair Andres Galvis Tellez',
    		'cuenta' => 'jgt08@hotmail.com',
    		'password' => '3556792'

    		])->attachRole('21');

    	
    }

}