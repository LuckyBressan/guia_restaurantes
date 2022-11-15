@extends('layouts.app')
@section('title','Visualização de Bares')
@section('content')
    @if ((Auth::check()) && (Auth::user()->isAdmin()))
        @section('create')
            <a href="{{ url('bares/'.$bar->id.'/edit') }}" class="nav-link">Editar</a>
        @endsection
        @section('funcionario')
            <a href="{{ url('funcionariosBar/create') }}" class="nav-link">Registrar Funcionário</a>
        @endsection
        @section('prato')
            <a href="{{ url('cardapiosBar/create') }}" class="nav-link">Registrar Cardápio</a>
        @endsection
    @endif

    
    <header class="location-banner">
        
    </header>
    
    <div class="info-loja container">
        <div class="logo-loja">
            @php
                $nomeimagem = "";
                if(file_exists("./img/bar/logo/".md5($bar->id).".jpg")){
                    $nomeimagem = "./img/bar/logo/".md5($bar->id).".jpg";
                } elseif (file_exists("./img/bar/logo/".md5($bar->id).".png")) {
                    $nomeimagem = "./img/bar/logo/".md5($bar->id).".png";
                } elseif (file_exists("./img/bar/logo/".md5($bar->id).".gif")) {
                    $nomeimagem = "./img/bar/logo/".md5($bar->id).".gif";
                } elseif (file_exists("./img/bar/logo/".md5($bar->id).".webp")) {
                    $nomeimagem = "./img/bar/logo/".md5($bar->id).".webp";
                } elseif (file_exists("./img/bar/logo/".md5($bar->id).".jpeg")) {
                    $nomeimagem = "./img/bar/logo/".md5($bar->id).".jpeg";
                } else {
                    $nomeimagem = "./img/bar/logo/default.png";
                }
            @endphp
            <img src="{{ asset($nomeimagem) }}" class="logo">
        </div>
        <div class="name-loja">
            <h1>{{ $bar->nome }}</h1>
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
                        <strong>Endereço:</strong> {{ $bar->rua }} <br>
                        <strong>Cidade/Estado:</strong> {{ $bar->cidade }} - {{ $bar->estado }} <br> <br>

                        <h5>Contato</h5>

                        <strong>Telefone:</strong> {{ $bar->telefone }} <br>
                        <strong>E-mail:</strong> {{ $bar->email }}
                    </div>
                </div>
            </div>
        </div> <hr>
        <div class="conteudo container">
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
                            $cont = 1;
                        @endphp
                        @php
                            $nomeimagem = "";

                            if(file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpg")){
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpg";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".png")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".png";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".gif")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".gif";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".webp")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".webp";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpeg")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpeg";
                                $cont++;
                            } else {
                                $nomeimagem = "./img/bar/ambiente/default.png";
                                $cont++;
                            }
                        @endphp
                        <img src="{{ asset($nomeimagem) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        @php
                            $nomeimagem = "";

                            if(file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpg")){
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpg";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".png")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".png";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".gif")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".gif";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".webp")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".webp";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpeg")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpeg";
                                $cont++;
                            } else {
                                $nomeimagem = "./img/bar/ambiente/default.png";
                                $cont++;
                            }
                        @endphp
                    <img src="{{ asset($nomeimagem) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                         @php
                            $nomeimagem = "";

                            if(file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpg")){
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpg";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".png")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".png";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".gif")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".gif";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".webp")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".webp";
                                $cont++;
                            } elseif (file_exists("./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpeg")) {
                                $nomeimagem = "./img/bar/ambiente/".md5($bar->id)."-".$cont.".jpeg";
                                $cont++;
                            } else {
                                $nomeimagem = "./img/bar/ambiente/default.png";
                                $cont++;
                            }
                        @endphp
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
            <div class="row row-cols-1 row-cols-md-5 g-4">
                @php
                    $cont = 1;
                @endphp
                    @foreach($cardapios as $cardapio)
                        @if($cont < 5)
                            <div class="col">
                                <a href="{{ url('cardapiosBar/'.$cardapio->bar_id) }}">
                                    <div class="local-fotos-pratos">
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
                                        <img src="{{ asset($nomeimagem) }}" class="fotos-pratos">
                                    </div>
                                </a>
                            </div>
                        @endif
                        @if($cont == 5)
                            <div class="col">
                                <a href="{{ url('cardapiosBar/'.$cardapio->bar_id) }}" style="text-decoration: none; color:inherit;">
                                    <div class="ver-mais-geral">
                                        <div class="caixa-ver-mais">
                                            <i class="fi fi-sr-angle-circle-right" style="font-size: 100px;"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @php
                            $cont++
                        @endphp
                    @endforeach
            </div>
            <br>
                            
            <h1>Equipe</h1> <hr>
            <div class="row row-cols-1 row-cols-md-5 g-4">
                @php
                    $cont = 1;
                @endphp
                @foreach($funcionarios as $funcionario)
                    @if($cont < 5)
                        <div class="col">
                            <a href="{{ url('funcionariosBar/'.$funcionario->bar_id) }}">
                                <div class="local-fotos-funcionarios">
                                    @php
                                        $nomeimagem = "";
                                        if(file_exists("./img/bar/funcionario/".md5($funcionario->id).".jpg")){
                                            $nomeimagem = "./img/bar/funcionario/".md5($funcionario->id).".jpg";
                                        } elseif (file_exists("./img/bar/funcionario/".md5($funcionario->id).".png")) {
                                            $nomeimagem = "./img/bar/funcionario/".md5($funcionario->id).".png";
                                        } elseif (file_exists("./img/bar/funcionario/".md5($funcionario->id).".gif")) {
                                            $nomeimagem = "./img/bar/funcionario/".md5($funcionario->id).".gif";
                                        } elseif (file_exists("./img/bar/funcionario/".md5($funcionario->id).".webp")) {
                                            $nomeimagem = "./img/bar/funcionario/".md5($funcionario->id).".webp";
                                        } elseif (file_exists("./img/bar/funcionario/".md5($funcionario->id).".jpeg")) {
                                            $nomeimagem = "./img/bar/funcionario/".md5($funcionario->id).".jpeg";
                                        } else {
                                            $nomeimagem = "./img/bar/funcionario/default.png";
                                        }
                                    @endphp
                                    <img src="{{ asset($nomeimagem) }}" class="foto-funcionario">
                                    <span class="texto">
                                        {{ $funcionario->nome }} - {{ $funcionario->funcao }}
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if($cont == 5)
                        <div class="col">
                            <a href="{{ url('funcionariosBar/'.$funcionario->bar_id) }}" style="text-decoration: none; color:inherit;">
                                <div class="ver-mais-geral">
                                    <div class="caixa-ver-mais">
                                        <i class="fi fi-sr-angle-circle-right" style="font-size: 100px;"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @php
                        $cont++
                    @endphp
                @endforeach
            </div>
           
            
        </div>

    </div>

@endsection