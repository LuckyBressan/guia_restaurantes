@extends('layouts.app')
@section('title','Listagem de Restaurantes')
@section('content')
    @if ((Auth::check()) && (Auth::user()->isAdmin()))
        @section('create')
            <a class="nav-link" href="{{ url('restaurantes/create') }}">Registrar Restaurante</a>
        @endsection
    @endif
    {{Form::open(['url'=>'restaurantes/filtrar', 'method'=>'GET'])}}
        <div class="input-group mb-3">
            @if($filtro!==null)
                &nbsp;<a href="{{url('restaurantes/')}}" class="btn btn-secondary">Todos</a>&nbsp;
            @endif
            {{Form::text('filtro',$filtro,['class'=>'form-control','required', 'placeholder'=>'Selecione a categoria...', 'list'=>'listcategorias'])}}
            <datalist id="listcategorias">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                @endforeach
            </datalist> &nbsp;
            {{Form::submit('Buscar',['class'=>'btn btn-dark'])}}
        </div>
    {{Form::close()}}
    
    {{Form::open(['url'=>'restaurantes/buscar', 'method'=>'GET'])}}
        <div class="input-group mb-3">
            @if($busca!==null)
            &nbsp;<a href="{{url('restaurantes/')}}" class="btn btn-secondary">Todos</a>&nbsp;
            @endif
            {{Form::text('busca',$busca,['class'=>'form-control', 'placeholder'=>'buscar'])}} &nbsp;
            {{Form::submit('Buscar',['class'=>'btn btn-dark'])}}
        </div>
    {{Form::close()}}
    <hr>
    
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
                <a href="{{ url('restaurantes/'.$restaurante->id) }}" class="btn btn-dark">Mais Informações</a>
            </div>
        </div>
        </div>
    @endforeach
    {{$restaurantes->links()}}

@endsection