<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    //trabalhar nisso
    public function index(Request $request){
        $erro = $request->get('erro');
        return view('site.index', ['erro' => $erro]);
    }

    /**
     * Mostrando formulário para tela de login.
     */
    public function mostrarLogin()
    {
        return view('app.login');
    }

}
