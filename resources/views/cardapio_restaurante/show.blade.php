@extends('layouts.app')
@section('title','Visualização de Restaurantes')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @if ((Auth::check()) && (Auth::user()->isAdmin()))
        <div class="col">
            <a href="{{ url('cardapios/create') }}" style="text-decoration: none; color:inherit;">
                <div class="criar-novo-prato">
                    <div class="criar-novo-icon">
                        <i class="fi fi-sr-add" style="font-size: 100px;"></i>
                    </div>
                </div>
            </a>
        </div>
    @endif
    @foreach($cardapios as $cardapio)
        <div class="col">
            @if ((Auth::check()) && (Auth::user()->isAdmin()))
            <a href="{{ url('cardapios/'.$cardapio->id.'/edit') }}" style="text-decoration: none; color:inherit;">
            @endif
            <div class="card mb-3 card-cardapio" style="max-width: 540px;">
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
                                @if ((Auth::check()) && (Auth::user()->isAdmin()))
                                    {{Form::open(['route'=>['cardapios.destroy',$cardapio->id],'method'=>'DELETE'])}}
                                    <input type="submit" value="Excluir" class="excluir" onclick="return confirm('Confirmar Exclusão?')">
                                    {{Form::close()}}
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            @if ((Auth::check()) && (Auth::user()->isAdmin()))
            </a>
            @endif
        </div>
    @endforeach
    </div>
@endsection