<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
    {
        return view('cadastros.atendimento');
    }

    public function cadastro() 
    {
        return 'cadastro';
    }
}
