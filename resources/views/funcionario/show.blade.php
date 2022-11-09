@extends('layouts.app')
@section('title','Visualização de Restaurantes')
@section('content')
        @section('create-funcionario')
            <a href="{{ url('funcionarios/create') }}" class="nav-link">Registrar Funcionário</a>
        @endsection
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($funcionarios as $funcionario)
        <div class="col">
            <div class="card" style="width: 18rem;">
                @php
                    $nomeimagem = "";
                    if(file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".jpg")){
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".jpg";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".png")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".png";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".gif")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".gif";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".webp")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".webp";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".jpeg")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".jpeg";
                    } else {
                        $nomeimagem = "./img/restaurante/funcionario/default.png";
                    }
                @endphp
                <img src="{{ asset($nomeimagem) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $funcionario->nome }}</h5>
                    <p class="card-text"><strong>IDADE: </strong>{{ $funcionario->idade }} <br>
                    <strong>FUNÇÃO: </strong>{{ $funcionario->funcao }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <!--
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 local-foto-cardapio">
                       
                        <img src="{{ asset($nomeimagem) }}" class="foto-cardapio" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $cardapio->nome }}</strong></h5>
                        <p class="card-text">
                            <strong>INGREDIENTES: </strong>{{ $cardapio->descricao }} <br>
                            <strong>VALOR: </strong>{{ $cardapio->valor }}
                        </p>
                    </div>
                    </div>
                </div>
            </div> !--> 
        </div>
    @endforeach
    </div>
@endsection