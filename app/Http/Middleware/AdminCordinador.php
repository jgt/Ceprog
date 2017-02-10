<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Auth;
use Closure;

class AdminCordinador
{

    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ( ! Auth::check())
        {
             
            return view('auth.login');

        }elseif ($this->auth->user()->is('adm') || $this->auth->user()->is('cdo')) {
            
            return $next($request);
        }else{


            flash()->overlay('Lo sentimos usted no tienes este rol', 'Error de acturizacion');
            return redirect()->back();
        }
 
        
    }
}
