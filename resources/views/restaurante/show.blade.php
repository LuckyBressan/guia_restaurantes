@extends('layouts.app')
@section('title','Visualização de Restaurantes')
@section('content')
    @section('create')
        <a href="{{ url('restaurantes/'.$restaurante->id.'/edit') }}" class="nav-link">Editar</a>
    @endsection
    @section('create-funcionario')
        <a href="{{ url('funcionarios/create') }}" class="nav-link">Registrar Funcionário</a>
    @endsection
    @section('edit-funcionario')
        
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
        </div> <hr>
        <div class="conteudo">
            <h1>Ambiente</h1><hr>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @php
                            $nomeimagem = "./img/promocao/praia.jpg";
                        @endphp
                        <img src="{{ asset($nomeimagem) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset($nomeimagem) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset($nomeimagem) }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br>


            <h1>Pratos</h1><hr>
            <div class="local-fotos-pratos">
                <div class="fotos-pratos">
                    <img src="">
                </div>
            </div>
            <br>


            <h1>Equipe</h1> <hr>
            <div class="local-fotos-funcionarios">
                @foreach($funcionarios as $funcionario)
                    <a href="{{ url('funcionarios/'.$funcionario->id.'/edit') }}" class="nav-link">
                        <div class="fotos-funcionarios">
                            @php
                                $nomeimagem = "";
                                if(file_exists("./img/funcionario/".md5($funcionario->id).".jpg")){
                                    $nomeimagem = "./img/funcionario/".md5($funcionario->id).".jpg";
                                } elseif (file_exists("./img/funcionario/".md5($funcionario->id).".png")) {
                                    $nomeimagem = "./img/funcionario/".md5($funcionario->id).".png";
                                } elseif (file_exists("./img/funcionario/".md5($funcionario->id).".gif")) {
                                    $nomeimagem = "./img/funcionario/".md5($funcionario->id).".gif";
                                } elseif (file_exists("./img/funcionario/".md5($funcionario->id).".webp")) {
                                    $nomeimagem = "./img/funcionario/".md5($funcionario->id).".webp";
                                } elseif (file_exists("./img/funcionario/".md5($funcionario->id).".jpeg")) {
                                    $nomeimagem = "./img/funcionario/".md5($funcionario->id).".jpeg";
                                } else {
                                    $nomeimagem = "./img/funcionario/default.png";
                                }
                            @endphp
                            <img src="{{ asset($nomeimagem) }}" class="foto-funcionario">
                            <span class="texto">
                                {{ $funcionario->nome }} - {{ $funcionario->funcao }}

                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
            
           
            
        </div>

    </div>

@endsection