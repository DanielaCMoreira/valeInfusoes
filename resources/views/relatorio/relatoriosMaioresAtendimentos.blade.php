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
                Relatório de Beneficiários mais atendidos
            </h4>
        </div>
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
                                <th scope="col">Beneficiário</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Quantidade Atendimentos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultados as $r => $resultado)
                                <tr>
                                    <th scope="row">{{$resultado->beneficiario_id}}</th>
                                    <td>{{$resultado->beneficiario[0]->nome}}</td>
                                    <td>{{date("d/m/Y", strtotime($resultado->beneficiario[0]->data_nascimento))}}</td>
                                    <td>{{$resultado->beneficiario[0]->sexo}}</td>
                                    <th scope="row">{{$resultado->total}}</th>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endisset
    </div>
@endsection
