@extends('layouts.app')
@section('title','Visualização de Restaurantes')
@section('content')
    @section('create')
        <a href="{{ url('restaurantes/'.$restaurante->id.'/edit') }}" class="nav-link">Editar</a>
    @endsection

    
    <header class="location-banner">
        
    </header>
    <div class="info-loja">
        <div class="logo-loja">
            @php
                $nomeimagem = "";
                if(file_exists("./img/restaurante/logo/".md5($restaurante->id).".jpg")){
                    $nomeimagem = "./img/restaurante/logo/".md5($restaurante->id).".jpg";
                } elseif (file_exists("./img/restaurante/logo/".md5($restaurante->id).".png")) {
                    $nomeimagem = "./img/restaurante/logo/".md5($restaurante->id).".png";
                } elseif (file_exists("./img/restaurante/logo/".md5($restaurante->id).".gif")) {
                    $nomeimagem = "./img/restaurante/logo/".md5($restaurante->id).".gif";
                } elseif (file_exists("./img/restaurante/logo/".md5($restaurante->id).".webp")) {
                    $nomeimagem = "./img/restaurante/logo/".md5($restaurante->id).".webp";
                } elseif (file_exists("./img/restaurante/logo/".md5($restaurante->id).".jpeg")) {
                    $nomeimagem = "./img/restaurante/logo/".md5($restaurante->id).".jpeg";
                } else {
                    $nomeimagem = "./img/restaurante/logo/default.png";
                }
            @endphp
            <img src="{{ asset($nomeimagem) }}" class="logo">
        </div>
        <div class="name-loja">
            <h1>{{ $restaurante->nome }}</h1>
        </div>
        <div class="ver-mais-info">
            <a data-bs-toggle="offcanvas" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="font-size: 17px;">
                 <strong>Ver Mais</strong>
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Informações do Estabelecimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="info-offcanvas">
                        <h5>Local</h5>
                        <strong>Endereço:</strong> {{ $restaurante->rua }} <br>
                        <strong>Cidade/Estado:</strong> {{ $restaurante->cidade }} - {{ $restaurante->estado }} <br> <br>

                        <h5>Contato</h5>

                        <strong>Telefone:</strong> {{ $restaurante->telefone }} <br>
                        <strong>E-mail:</strong> {{ $restaurante->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection