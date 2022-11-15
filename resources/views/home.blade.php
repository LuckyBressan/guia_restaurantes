@extends('layouts.app')
@extends('layouts.categorias')

@section('content')
<div class="container">
        <div id="carouselExampleIndicators" class="carousel slide carrossel-funcoes" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <a href="{{ url('restaurantes') }}">
                    <div class="carousel-item active">
                        @php
                            $nomeimagem = "./img/promocao/restaurantes.png";
                        @endphp
                        <img src="{{ asset($nomeimagem) }}" class="d-block w-100" alt="...">
                        @if ((Auth::check()) && (Auth::user()->isAdmin()))
                            <a href="{{ url('restaurantes/create') }}"><button class="criar">Registrar</button></a>
                        @endif
                    </div>
                </a>
                <a href="{{ url('bares') }}">
                    <div class="carousel-item">
                        @php
                            $nomeimagem = "./img/promocao/bares.png";
                        @endphp
                        <img src="{{ asset($nomeimagem) }}" class="d-block w-100" alt="...">
                        @if ((Auth::check()) && (Auth::user()->isAdmin()))
                            <a href="{{ url('bares/create') }}"><button class="criar">Registrar</button></a>
                        @endif
                    </div>
                </a>
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
</div>
@endsection
