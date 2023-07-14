<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class MedicoController extends Controller
{
    public function index()
    {
        return view('cadastros.medico');
    }

    public function cadastro(Request $request) 
    {
        $request->validate(
            [
                'nome' => 'required|max:255|min:5',
                'data_nascimento' => 'required',
                'crm' => 'required|max:255|min:5'
            ],
            [
                'nome.required' => 'O campo nome é obrigatório',
                'data_nascimento.required' => 'O campo data de nascimento é obrigatório',
                'crm.required' => 'O campo CRM é obrigatório',
            ]
        );

        Medico::create([
            'nome' => $request->nome,
            'data_nascimento' => Carbon::parse($request->data_nascimento)->format('Y-m-d'),
            'crm' => $request->crm,
        ]);

        return Redirect::back()->withErrors(['msg' => 'Cadastro realizado com sucesso!']);
    }
}
