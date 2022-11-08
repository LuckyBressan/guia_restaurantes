@extends('layouts.app')
@section('title','Visualização de Restaurantes')
@section('content')
    @section('create-prato')
        <a href="{{ url('cardapios/create') }}" class="nav-link">Registrar Prato</a>
    @endsection
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($cardapios as $cardapio)
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 local-foto-cardapio">
                        @php
                            $nomeimagem = "";
                            if(file_exists("./img/restaurante/cardapio/".md5($cardapio->id).".jpg")){
                                $nomeimagem = "./img/restaurante/cardapio/".md5($cardapio->id).".jpg";
                            } elseif (file_exists("./img/restaurante/cardapio/".md5($cardapio->id).".png")) {
                                $nomeimagem = "./img/restaurante/cardapio/".md5($cardapio->id).".png";
                            } elseif (file_exists("./img/restaurante/cardapio/".md5($cardapio->id).".gif")) {
                                $nomeimagem = "./img/restaurante/cardapio/".md5($cardapio->id).".gif";
                            } elseif (file_exists("./img/restaurante/cardapio/".md5($cardapio->id).".webp")) {
                                $nomeimagem = "./img/restaurante/cardapio/".md5($cardapio->id).".webp";
                            } elseif (file_exists("./img/restaurante/cardapio/".md5($cardapio->id).".jpeg")) {
                                $nomeimagem = "./img/restaurante/cardapio/".md5($cardapio->id).".jpeg";
                            } else {
                                $nomeimagem = "./img/restaurante/cardapio/default.png";
                            }
                        @endphp
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
            </div> 
        </div>
    @endforeach
    </div>
@endsection