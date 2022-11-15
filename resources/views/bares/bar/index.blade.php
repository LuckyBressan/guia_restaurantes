@extends('layouts.app')
@section('title','Listagem de Bares')
@section('content')
    @if ((Auth::check()) && (Auth::user()->isAdmin()))
        @section('create')
            <a class="nav-link" href="{{ url('bares/create') }}">Registrar Bar</a>
        @endsection
    @endif
    {{Form::open(['url'=>'bares/filtrar', 'method'=>'GET'])}}
        <div class="input-group mb-3">
            @if($filtro!==null)
                &nbsp;<a href="{{url('bares/')}}" class="btn btn-secondary">Todos</a>&nbsp;
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
    
    {{Form::open(['url'=>'bares/buscar', 'method'=>'GET'])}}
        <div class="input-group mb-3">
            @if($busca!==null)
            &nbsp;<a href="{{url('bares/')}}" class="btn btn-secondary">Todos</a>&nbsp;
            @endif
            {{Form::text('busca',$busca,['class'=>'form-control', 'placeholder'=>'buscar'])}} &nbsp;
            {{Form::submit('Buscar',['class'=>'btn btn-dark'])}}
        </div>
    {{Form::close()}}
    <hr>
    
    <div class="row row-cols-1 row-cols-md-2 g-4">

    @foreach($bares as $bar)
        <div class="col">
        <div class="card mb-3">
            @php
                $nomeimagem = "";
                if(file_exists("./img/bar/foto/".md5($bar->id).".jpg")){
                    $nomeimagem = "./img/bar/foto/".md5($bar->id).".jpg";
                } elseif (file_exists("./img/bar/foto/".md5($bar->id).".png")) {
                    $nomeimagem = "./img/bar/foto/".md5($bar->id).".png";
                } elseif (file_exists("./img/bar/foto/".md5($bar->id).".gif")) {
                    $nomeimagem = "./img/bar/foto/".md5($bar->id).".gif";
                } elseif (file_exists("./img/bar/foto/".md5($bar->id).".webp")) {
                    $nomeimagem = "./img/bar/foto/".md5($bar->id).".webp";
                } elseif (file_exists("./img/bar/foto/".md5($bar->id).".jpeg")) {
                    $nomeimagem = "./img/bar/foto/".md5($bar->id).".jpeg";
                } else {
                    $nomeimagem = "./img/bar/foto/default.png";
                }
            @endphp
            {{ Html::image(asset($nomeimagem)), 'Foto de '.$bar->nome, ['class'=>'card-img-top'] }}
            <div class="card-body">
                <h5 class="card-title">{{$bar->nome}}</h5>
                <p class="card-text">{{ $bar->rua.' - '.$bar->cidade.' - '.$bar->estado }} <br> 
                {{ $bar->telefone }}
                </p>
                <a href="{{ url('bares/'.$bar->id) }}" class="btn btn-dark">Mais Informações</a>
            </div>
        </div>
        </div>
    @endforeach
    {{$bares->links()}}

@endsection