<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function index()
    {
        return view('cadastros.beneficiario');
    }

    public function cadastro() 
    {
        return 'cadastro';
    }
}
