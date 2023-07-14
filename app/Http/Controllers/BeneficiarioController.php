<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class BeneficiarioController extends Controller
{
    public function index()
    {
        return view('cadastros.beneficiario');
    }

    public function cadastro(Request $request) 
    {
        $request->validate(
            [
                'nome' => 'required|max:255|min:5',
                'data_nascimento' => 'required'
            ],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'data_nascimento.required' => 'O campo data de nascimento é obrigatório',
            ]
        );

        Beneficiario::create([
            'nome' => $request->nome,
            'data_nascimento' => Carbon::parse($request->data_nascimento)->format('Y-m-d'),
            'sexo' => $request->sexo,
        ]);

        return Redirect::back()->withErrors(['msg' => 'Cadastro realizado com sucesso!']);
    }
}
