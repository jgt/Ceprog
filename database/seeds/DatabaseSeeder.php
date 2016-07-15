<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Styde\Seeder\BaseSeeder;

class DatabaseSeeder extends BaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	protected $truncate = array(
        'users',
    );
 
    protected $seeders = array(
        'User',
    );
}
