@extends('layouts.app')

@section('links')
    @parent
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
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
                Relatório de Beneficiário
            </h4>
        </div>
        <form action="{{route('relatorio.beneficiarios.resultados')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-9 mt-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Beneficiário</label>
                        <input type="text" class="form-control campoData removerEstilosBootstrap inputPadrao" value="@isset($request->nome) {{$request->nome}} @endisset" id="nome" name="nome" placeholder="Pesquise por nome do beneficiário">
                    </div>
                </div>
                <div class="col-3 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <label for="exampleInputEmail1">Sexo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="todos" value="" @isset($request->sexo) @if($request->sexo == '') checked @endif @endisset>
                                <label class="form-check-label" for="todos">
                                    Todos
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="feminino" value="f"  @isset($request->sexo) @if($request->sexo == 'f') checked @endif @endisset>
                                <label class="form-check-label" for="feminino">
                                    Feminino
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="masculino" value="m"  @isset($request->sexo) @if($request->sexo == 'm') checked @endif @endisset>
                                <label class="form-check-label" for="masculino">
                                    Masculino
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <div class="row justify-content-end">
                        <div class="col-3">
                            <label for="exampleInputEmail1">Data de Nascimento de</label>
                        </div>
                        <div class="col-4">
                            <input type="date" class="form-control data  removerEstilosBootstrap inputPadrao" id="de" name="de" @isset($request->de) value="{{$request->de}}" @endisset>
                        </div>
                        <div class="col-1">
                            <label for="exampleInputEmail1">até</label>
                        </div>
                        <div class="col-4">
                            <input type="date" class="form-control data  removerEstilosBootstrap inputPadrao" id="ate" name="ate" @isset($request->ate) value="{{$request->ate}}" @endisset>
                        </div>
                    </div>
                </div>
                <div class="col-3 pr-0">
                    <button type="submit" class="btn btn-primary w-100 ">Pesquisar</button>
                </div>
            </div>
        </form>
        @isset($resultados)
            <div class="row mt-5 d-flex">
                <h4>
                    Resultados
                </h4>
            </div>
            <div class="row">
                <div class="col-12 p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Data de Nascimento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultados as $resultado)
                                <tr>
                                    <th scope="row">{{$resultado->id}}</th>
                                    <td>{{$resultado->nome}}</td>
                                    <td>{{$resultado->sexo}}</td>
                                    <td>{{date("d/m/Y", strtotime($resultado->data_nascimento))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endisset
    </div>
@endsection
