<?php

namespace App\Http\Controllers;

use App\Models\AtendimentoMedico;
use App\Models\Beneficiario;
use App\Models\Especialidade;
use App\Models\LocalAtendimento;
use App\Models\Medico;
use App\Models\Procedimento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function beneficiarios()
    {
        $beneficiarios = Beneficiario::select('id', 'nome')->get();

        return view('relatorio.relatorioBeneficiario', compact('beneficiarios'));
    }
    
    public function beneficiariosResultados(Request $request)
    {
        $periodo = array();
        $nome = $request->nome;
        $sexo = $request->sexo;

        if(!empty($request->de) && !empty($request->ate)) {
            $periodo ['de'] =  Carbon::parse($request->de)->format('Y-m-d');
            $periodo ['ate'] =  Carbon::parse($request->ate)->format('Y-m-d');
        }

        $resultados = Beneficiario::when($nome, function ($query, $nome) {
                return $query->where('nome', 'like', '%' . $nome . '%');
            })
            ->when($sexo, function ($query, $sexo) {
                return $query->where('sexo', $sexo);
            })
            ->when($periodo, function ($query, $periodo) {
                return $query->whereBetween('data_nascimento', [$periodo['de'], $periodo['ate']]);
            })
            ->get();

        return view('relatorio.relatorioBeneficiario', compact('resultados','request'));
    }
    
    public function medicos()
    {
        return view('relatorio.relatorioMedicos');
    }
    
    public function medicosResultados(Request $request)
    {
        $periodo = array();
        $nome = $request->nome;

        if(!empty($request->de) && !empty($request->ate)) {
            $periodo ['de'] =  Carbon::parse($request->de)->format('Y-m-d');
            $periodo ['ate'] =  Carbon::parse($request->ate)->format('Y-m-d');
        }

        $resultados = Medico::when($nome, function ($query, $nome) {
                return $query->where('nome', 'like', '%' . $nome . '%');
            })
            ->when($periodo, function ($query, $periodo) {
                return $query->whereBetween('data_nascimento', [$periodo['de'], $periodo['ate']]);
            })
            ->get();

        return view('relatorio.relatorioMedicos', compact('resultados','request'));
    }
    
    public function locaisAtendimento()
    {
        $medicos = Medico::select('id','nome')->get();
        $especialidades = Especialidade::select('id','especialidade')->get();

        return view('relatorio.relatorioLocaisAtendimento', compact('medicos','especialidades'));
    }
   
    public function locaisAtendimentoResultados(Request $request)
    {
        $medicos = Medico::select('id','nome')->get();
        $especialidades = Especialidade::select('id','especialidade')->get();
        
        $filtro_endereco = $request->endereco;
        $filtro_medico = $request->medico;
        $filtro_especialidade = $request->especialidade;

        $resultados = LocalAtendimento::select('local_atendimento.id','local_atendimento.endereco','medico.nome','especialidade.especialidade')
            ->join('medico', 'medico.id','local_atendimento.medico_id')
            ->join('especialidade', 'especialidade.id','local_atendimento.especialidade_id')
            ->when($filtro_endereco, function ($query, $filtro_endereco) {
                return $query->where('local_atendimento.endereco', 'like', '%' . $filtro_endereco . '%');
            })
            ->when($filtro_medico, function ($query, $filtro_medico) {
                return $query->where('local_atendimento.medico_id', $filtro_medico);
            })
            ->when($filtro_especialidade, function ($query, $filtro_especialidade) {
                return $query->where('local_atendimento.especialidade_id', $filtro_especialidade);
            })
            ->get();

        return view('relatorio.relatorioLocaisAtendimento', compact('medicos','especialidades','resultados','request'));
    }

    public function atendimentos()
    {
        $tiposProcedimentos = Procedimento::select('tipo_procedimento')->groupBy('tipo_procedimento')->get();
        return view('relatorio.relatorioAtendimento', compact('tiposProcedimentos'));
    }

    public function atendimentosResultados(Request $request)
    {        
        $tiposProcedimentos = Procedimento::select('tipo_procedimento')->groupBy('tipo_procedimento')->get();

        $periodo = array();
        if(!empty($request->de) && !empty($request->ate)) {
            $periodo ['de'] =  Carbon::parse($request->de)->format('Y-m-d');
            $periodo ['ate'] =  Carbon::parse($request->ate)->format('Y-m-d');
        }
        
        $filtro_beneficiario = $request->nomeBeneficiario;
        $filtro_medico = $request->nomeMedico;
        $filtro_especialidade = $request->especialidade;
        $filtro_endereco = $request->endereco;
        $filtro_procedimento = $request->procedimento;
        $filtro_tipoProcedimento = $request->tipoProcedimento;

        $resultados = AtendimentoMedico::select('atendimento_medico.id','atendimento_medico.data','local_atendimento.endereco','beneficiario.nome','medico.nome as nomeMedico','especialidade.especialidade','procedimento.descricao_procedimento','procedimento.tipo_procedimento')
            ->join('local_atendimento', 'local_atendimento.id','atendimento_medico.local_id')
            ->join('especialidade', 'especialidade.id','local_atendimento.especialidade_id')
            ->join('medico', 'medico.id','local_atendimento.medico_id')
            ->join('procedimento','procedimento.id','atendimento_medico.procedimento_id')
            ->join('beneficiario','beneficiario.id','atendimento_medico.beneficiario_id')
            ->when($filtro_beneficiario, function ($query, $filtro_beneficiario) {
                return $query->where('beneficiario.nome', 'like', '%' . $filtro_beneficiario . '%');
            })
            ->when($filtro_medico, function ($query, $filtro_medico) {
                return $query->where('medico.nome', 'like', '%' . $filtro_medico . '%');
            })
            ->when($filtro_especialidade, function ($query, $filtro_especialidade) {
                return $query->where('especialidade.especialidade', 'like', '%' . $filtro_especialidade . '%');
            })
            ->when($filtro_endereco, function ($query, $filtro_endereco) {
                return $query->where('local_atendimento.endereco', 'like', '%' . $filtro_endereco . '%');
            })
            ->when($filtro_procedimento, function ($query, $filtro_procedimento) {
                return $query->where('procedimento.descricao_procedimento', 'like', '%' . $filtro_procedimento . '%');
            })
            ->when($filtro_tipoProcedimento, function ($query, $filtro_tipoProcedimento) {
                return $query->where('procedimento.tipo_procedimento', $filtro_tipoProcedimento);
            })
            ->when($periodo, function ($query, $periodo) {
                return $query->whereBetween('data', [$periodo['de'], $periodo['ate']]);
            })
            ->get();

        return view('relatorio.relatorioAtendimento', compact('tiposProcedimentos','resultados','request'));
    }
    
    public function beneficiariosMaioresAtendimentos()
    {
        $resultados = AtendimentoMedico::with('beneficiario')
            ->select(DB::raw('count(*) as total'),'beneficiario_id')
            ->groupBy('beneficiario_id')
            ->orderBy('total','DESC')
            ->get();

        return view('relatorio.relatoriosMaioresAtendimentos', compact('resultados'));
    }
}
