<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PsicologoController extends Controller
{
     public function perfil(Request $request){
       
        return view('psicologo.show');
    }
}
