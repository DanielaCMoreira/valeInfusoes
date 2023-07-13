<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function beneficiarios()
    {
        return view('relatorio.relatorioBeneficiario');
    }
    
    public function medicos()
    {
        return view('relatorio.relatorioMedicos');
    }
    
    public function atendimentos()
    {
        return view('relatorio.relatorioAtendimento');
    }
    
    public function locaisAtendimento()
    {
        return view('relatorio.relatorioLocaisAtendimento');
    }
    
    public function beneficiariosMaioresAtendimentos()
    {
        return view('relatorio.relatoriosMaioresAtendimentos');
    }

}
