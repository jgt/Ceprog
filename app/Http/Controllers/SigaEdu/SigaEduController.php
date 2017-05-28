<?php

namespace App\Http\Controllers\SigaEdu;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SigaEdu;
use Illuminate\Support\Facades\DB;

class SigaEduController extends Controller
{
   
   public function show()
   {

        $users = DB::connection('edu')->select('select * from Empleados');
        dd($users);
   }
}
