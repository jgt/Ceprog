<?php

namespace App\Http\Middleware;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Auth;
use Closure;

class AdminMaestro
{
    protected $auth;
 
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! Auth::check())
        {
             
            return view('auth.login');

        }elseif ($this->auth->user()->is('prf') || $this->auth->user()->is('adm')) {
            
            return $next($request);
        }else{


            flash()->overlay('Lo sentimos usted no tienes este rol', 'Error de acturizacion');
            return redirect()->back();
        }
 
        
    }
}
