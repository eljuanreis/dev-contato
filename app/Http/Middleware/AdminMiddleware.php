<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        session_start();
        if(isset($_SESSION['ID']) && isset($_SESSION['EMAIL']) && isset($_SESSION['NOME'])){
            return $next($request);
        }else{
            return redirect()->route('inicio', ['erro' => 'Sem permissão']);
        }
        
    }
}
