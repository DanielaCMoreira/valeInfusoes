@extends('layouts.app')

@section('links')
    @parent
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cadastros.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row d-flex">
            <h4>
                <a href="{{route('home')}}" class="removerEstilosBootstrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>    
                </a>
                Cadastro de Atendimento
            </h4>
        </div>
        <form action="{{route('atendimento.cadastro')}}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="col-12 p-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Beneficiário</label>
                        <select class="form-control removerEstilosBootstrap inputPadrao" name="beneficiario">
                            @foreach($beneficiarios as $beneficiario)
                                <option value="{{$beneficiario->id}}">{{$beneficiario->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 p-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Local</label>
                        <select class="form-control removerEstilosBootstrap inputPadrao" name="endereco">
                            @foreach($locaisAtendimento as $local)
                                <option value="{{$local->id}}">{{$local->endereco}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3 pr-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Médico</label>
                        <select class="form-control removerEstilosBootstrap inputPadrao" name="medico">
                            @foreach($locaisAtendimento as $local)
                                @foreach($local->medicos as $medico)
                                    <option value="{{$medico->id}}">{{$medico->nome}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3 pr-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Especialidade</label>
                        <select class="form-control removerEstilosBootstrap inputPadrao" name="especialidade">
                            @foreach($locaisAtendimento as $local)
                                @foreach($local->especialidades as $especialidade)
                                    <option value="{{$especialidade->id}}">{{$especialidade->especialidade}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 p-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Procedimento</label>
                        <select class="form-control removerEstilosBootstrap inputPadrao" name="procedimento">
                            @foreach($procedimentos as $procedimento)
                                <option value="{{$procedimento->id}}">{{$procedimento->descricao_procedimento}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4 pr-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Data</label>
                        <input type="date" class="form-control data  removerEstilosBootstrap inputPadrao" id="data" name="data">
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-2 p-0">
                    <button type="submit" class="btn btn-primary w-100 ">CADASTRAR</button>
                </div>
            </div>
        </form>
        @if(isset($sucesso))
            <div class="row mt-3">
                <div class="col-12 p-0">
                    <div class="alert alert-success" role="alert">
                        {{$sucesso}}
                    </div>
                </div>
            </div>
        @endif
        @if($errors->any())
            <div class="row mt-3">
                <div class="col-12 p-0">
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            {{$error}} <br>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
