<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash(Request $request){
        $nome = 'Michele';
        $name = 'Paulo';
        return view('admin.dashboard', compact('nome','name'));
    }
}
