<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Auth;

class AdminAlmPrf
{
    
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
         if ( ! Auth::check())
        {
             
            return view('auth.login');

        }elseif ($this->auth->user()->is('prf') || $this->auth->user()->is('adm') || $this->auth->user()->is('alm')) {
            
            return $next($request);
        }else{

            return redirect()->back();
        }
    }
}
