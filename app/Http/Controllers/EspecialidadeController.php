<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    public function index()
    {
        return view('cadastros.especialidade');
    }

    public function cadastro(Request $request) 
    {
        $request->validate(
            [
                'especialidade' => 'required|max:255|min:5',
                'cbo' => 'required'
            ],
            [
                'especialidade.required' => 'O campo especialidade é obrigatório',
                'cbo.required' => 'O campo data de nascimento é obrigatório',
            ]
        );

        Especialidade::create([
            'especialidade' => $request->especialidade,
            'cbos' => $request->cbo,
        ]);

        return view('cadastros.beneficiario')->with('sucesso', 'Cadastro realizado com sucesso!');
    }
}
