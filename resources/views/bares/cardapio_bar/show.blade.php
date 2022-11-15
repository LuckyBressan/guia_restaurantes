@extends('layouts.app')
@section('title','Visualização de Cardápio')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @if ((Auth::check()) && (Auth::user()->isAdmin()))
        <div class="col">
            <a href="{{ url('cardapiosBar/create') }}" style="text-decoration: none; color:inherit;">
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
            <div class="card mb-3 card-cardapio" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 local-foto-cardapio">
                        @php
                            $nomeimagem = "";
                            if(file_exists("./img/bar/cardapio/".md5($cardapio->id).".jpg")){
                                $nomeimagem = "./img/bar/cardapio/".md5($cardapio->id).".jpg";
                            } elseif (file_exists("./img/bar/cardapio/".md5($cardapio->id).".png")) {
                                $nomeimagem = "./img/bar/cardapio/".md5($cardapio->id).".png";
                            } elseif (file_exists("./img/bar/cardapio/".md5($cardapio->id).".gif")) {
                                $nomeimagem = "./img/bar/cardapio/".md5($cardapio->id).".gif";
                            } elseif (file_exists("./img/bar/cardapio/".md5($cardapio->id).".webp")) {
                                $nomeimagem = "./img/bar/cardapio/".md5($cardapio->id).".webp";
                            } elseif (file_exists("./img/bar/cardapio/".md5($cardapio->id).".jpeg")) {
                                $nomeimagem = "./img/bar/cardapio/".md5($cardapio->id).".jpeg";
                            } else {
                                $nomeimagem = "./img/bar/cardapio/default.png";
                            }
                        @endphp
                        <img src="{{ asset($nomeimagem) }}" class="foto-cardapio" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $cardapio->nome }}</strong></h5>
                            <p class="card-text">
                                <strong>DESCRIÇÃO: </strong>{{ $cardapio->descricao }} <br> 
                                <strong>VALOR: </strong>{{ $cardapio->valor }}
                            </p>
                            <div class="acoes">
                                @if ((Auth::check()) && (Auth::user()->isAdmin()))
                                    {{Form::open(['route'=>['cardapiosBar.destroy',$cardapio->id],'method'=>'DELETE'])}}                                    
                                        <input type="submit" value="Excluir" class="excluir" onclick="return confirm('Confirmar Exclusão?')">
                                    {{Form::close()}}
                                    <a href="{{ url('cardapiosBar/'.$cardapio->id.'/edit') }}" style="text-decoration: none; color:inherit;"><button class="editar">Editar</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    {{$cardapios->links()}}
@endsection
