@extends('layouts.app')

@section('links')
    @parent
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row d-flex">
            <div class="caixaFlex">
                <p>teste</p>
            </div>
            <div class="caixaFlex">
                <p>teste</p>
            </div>
            <div class="caixaFlex">
                <p>teste</p>
            </div>
            <div class="caixaFlex">
                <p>teste</p>
            </div>
            <div class="caixaFlex">
                <p>teste</p>
            </div>
        </div>
    </div>
@endsection
