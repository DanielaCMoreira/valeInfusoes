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
                Cadastro de Beneficiários
            </h4>
        </div>
        <form action="{{route('beneficiario.cadastro')}}" method="POST"> 
            @csrf
            <div class="row mt-5">
                <div class="col-12 p-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome do Beneficiário</label>
                        <input type="text" class="form-control campoData removerEstilosBootstrap inputPadrao" id="nome" name="nome" placeholder="Insira o nome do beneficiário">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4 p-0">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Data de Nascimento</label>
                        <input type="date" class="form-control data  removerEstilosBootstrap inputPadrao" id="data_nascimento" name="data_nascimento">
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-6 mt-4 p-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="feminino" value="f" checked>
                                <label class="form-check-label" for="feminino">
                                    Feminino
                                </label>
                            </div>
                        </div>
                        <div class="col-6 mt-4 p-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="masculino" value="m">
                                <label class="form-check-label" for="masculino">
                                    Masculino
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-2 p-0">
                    <button type="submit" class="btn btn-primary w-100 ">CADASTRAR</button>
                </div>
            </div>
        </form>
        @if($errors->any())
            <div class="row mt-3">
                <div class="col-12 p-0">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-primary" role="alert">
                            {{$error}} <br>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
