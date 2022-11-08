@extends('layouts.app')
@section('title','Listagem de Restaurantes')
@section('content')
    @section('create')
        <a class="nav-link" href="{{ url('restaurantes/create') }}">Registrar Restaurante</a>
    @endsection

    <h1>Listagem de Restaurantes</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach($restaurantes as $restaurante)
        <div class="col">
        <div class="card mb-3">
            @php
                $nomeimagem = "";
                if(file_exists("./img/restaurante/foto/".md5($restaurante->id).".jpg")){
                    $nomeimagem = "./img/restaurante/foto/".md5($restaurante->id).".jpg";
                } elseif (file_exists("./img/restaurante/foto/".md5($restaurante->id).".png")) {
                    $nomeimagem = "./img/restaurante/foto/".md5($restaurante->id).".png";
                } elseif (file_exists("./img/restaurante/foto/".md5($restaurante->id).".gif")) {
                    $nomeimagem = "./img/restaurante/foto/".md5($restaurante->id).".gif";
                } elseif (file_exists("./img/restaurante/foto/".md5($restaurante->id).".webp")) {
                    $nomeimagem = "./img/restaurante/foto/".md5($restaurante->id).".webp";
                } elseif (file_exists("./img/restaurante/foto/".md5($restaurante->id).".jpeg")) {
                    $nomeimagem = "./img/restaurante/foto/".md5($restaurante->id).".jpeg";
                } else {
                    $nomeimagem = "./img/restaurante/foto/default.png";
                }
            @endphp
            {{ Html::image(asset($nomeimagem)), 'Foto de '.$restaurante->nome, ['class'=>'card-img-top'] }}
            <div class="card-body">
                <h5 class="card-title">{{$restaurante->nome}}</h5>
                <p class="card-text">{{ $restaurante->rua.' - '.$restaurante->cidade.' - '.$restaurante->estado }} <br> 
                {{ $restaurante->telefone }}
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

                <a href="{{ url('restaurantes/'.$restaurante->id) }}" class="btn btn-dark">Mais Informações</a>
            </div>
        </div>
        </div>
    @endforeach


@endsection