<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalAtendimento;
use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Support\Facades\Redirect;

class LocalController extends Controller
{
    public function index()
    {
        $medicos = Medico::select('id','nome')->orderBy('nome','ASC')->get();
        $especialidades = Especialidade::select('id','especialidade')->orderBy('especialidade','ASC')->get();

        return view('cadastros.local', compact('medicos','especialidades'));
    }

    public function cadastro(Request $request) 
    {
        $request->validate(
            [
                'endereco' => 'required|max:255|min:5',
                'medico' => 'required',
                'especialidade' => 'required'
            ],
            [
                'endereco.required' => 'O campo endereco é obrigatório',
                'medico.required' => 'O campo médico é obrigatório',
                'especialidade.required' => 'O campo especialidade é obrigatório'
            ]
        );

        LocalAtendimento::create([
            'endereco' => $request->endereco,
            'medico_id' => $request->medico,
            'especialidade_id' => $request->especialidade,
        ]);

        return Redirect::back()->withErrors(['msg' => 'Cadastro realizado com sucesso!']);
    }
}
