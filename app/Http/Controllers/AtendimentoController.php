<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalAtendimento;
use App\Models\Beneficiario;
use App\Models\Procedimento;
use App\Models\AtendimentoMedico;

class AtendimentoController extends Controller
{
    public function index()
    {
        $locaisAtendimento = LocalAtendimento::with('medicos','especialidades')->get();
        $beneficiarios = Beneficiario::select('id','nome')->get();
        $procedimentos = Procedimento::select('id','descricao_procedimento')->get();
        
        return view('cadastros.atendimento', compact('locaisAtendimento','beneficiarios','procedimentos'));
    }

    public function carregarCampos(Request $request)
    {
        switch ($request->campo) {
            case 'local':
                $local = LocalAtendimento::where('id', $request->local)->first();
                return $local;

                break;
            case 'medico':
                $local = LocalAtendimento::where('medico_id', $request->medico)->first();
                return $local;

                break;
            case 'especialidade':
                $local = LocalAtendimento::where('especialidade_id', $request->especialidade)->first();
                return $local;
                
                break;
            default:
                $local = LocalAtendimento::first();
                break;
        }
    }

    public function cadastro(Request $request) 
    {
        $request->validate(
            [
                'beneficiario' => 'required',
                'endereco' => 'required',
                'medico' => 'required',
                'especialidade' => 'required',
                'procedimento' => 'required',
                'data' => 'required'
            ],
            [
                'beneficiario.required' => 'O campo beneficiário é obrigatório',
                'endereco.required' => 'O campo local é obrigatório',
                'medico.required' => 'O campo médico é obrigatório',
                'especialidade.required' => 'O campo especialidade é obrigatório',
                'data.required' => 'O campo data é obrigatório'
            ]
        );

        AtendimentoMedico::create([
            'beneficiario_id' => $request->beneficiario,
            'especialidade_id' => $request->especialidade,
            'medico_id' => $request->medico,
            'local_id' => $request->endereco,
            'procedimento_id' => $request->procedimento,
            'data' => $request->data,
        ]);

        return redirect()->back()->with('sucesso', 'Cadastro realizado com sucesso!');
    }
}
