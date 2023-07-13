<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index()
    {
        return view('cadastros.especialidade');
    }

    public function cadastro() 
    {
        return 'cadastro';
    }
}
