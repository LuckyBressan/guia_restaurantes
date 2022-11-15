@extends('layouts.app')
@section('title','Visualização de Restaurantes')
@section('content')
    <div class="row row-cols-1 row-cols-md-4 g-4">
    @if ((Auth::check()) && (Auth::user()->isAdmin()))
        <div class="col">
            <a href="{{ url('funcionarios/create') }}" style="text-decoration: none; color:inherit;">
                <div class="criar-novo-funcionario">
                    <div class="criar-novo-icon">
                        <i class="fi fi-sr-add" style="font-size: 100px;"></i>
                    </div>
                </div>
            </a>
        </div>
    @endif
    @foreach($funcionarios as $funcionario)
        <div class="col">
            <div class="card card-funcionario" style="width: 18rem;">
                @php
                    $nomeimagem = "";
                    if(file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".jpg")){
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".jpg";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".png")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".png";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".gif")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".gif";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".webp")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".webp";
                    } elseif (file_exists("./img/restaurante/funcionario/".md5($funcionario->id).".jpeg")) {
                        $nomeimagem = "./img/restaurante/funcionario/".md5($funcionario->id).".jpeg";
                    } else {
                        $nomeimagem = "./img/restaurante/funcionario/default.png";
                    }
                @endphp
                <img src="{{ asset($nomeimagem) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $funcionario->nome }}</h5>
                    <p class="card-text"><strong>IDADE: </strong>{{ $funcionario->idade }} <br>
                    <strong>FUNÇÃO: </strong>{{ $funcionario->funcao }}</p>
                </div>
                <div class="acoes-funcionario">
                    @if ((Auth::check()) && (Auth::user()->isAdmin()))
                        {{Form::open(['route'=>['funcionarios.destroy',$funcionario->id],'method'=>'DELETE'])}}                                    
                            <input type="submit" value="Excluir" class="excluir-funcionario" onclick="return confirm('Confirmar Exclusão?')">
                        {{Form::close()}}
                        <a href="{{ url('funcionarios/'.$funcionario->id.'/edit') }}" style="text-decoration: none; color:inherit;"><button class="editar-funcionario">Editar</button></a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
    {{$funcionarios->links()}}
@endsection