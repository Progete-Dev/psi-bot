<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function show(Request $request){
       
        return view('paciente.show')->with('warning','Warning Message');
    }
}
