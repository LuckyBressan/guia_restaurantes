@extends('layouts.app')
@section('title','Listagem de Restaurantes')
@section('content')
    <h1>Registro de Funcionário</h1>
    
    {{Form::open(['route'=>'funcionarios.store','method'=>'POST', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('nome','Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required', 'placeholder'=>'Nome do Funcionário'])}}
        <br>
        {{Form::label('idade','Idade')}}
        {{Form::number('idade','',['class'=>'form-control','required', 'placeholder'=>'Idade do Funcionário'])}}
        <br>
        {{Form::label('restaurante_id','Restaurante')}}
        {{Form::text('restaurante_id','',['class'=>'form-control','required', 'placeholder'=>'Selecione o restaurante...', 'list'=>'listrestaurantes'])}}
        <datalist id="listrestaurantes">
            @foreach($restaurantes as $restaurante)
                <option value="{{$restaurante->id}}">{{$restaurante->nome}}</option>
            @endforeach
        </datalist>
        <br>
        {{Form::label('funcao','Funcao')}}
        {{Form::text('funcao','',['class'=>'form-control','required', 'placeholder'=>'Informe a função...'])}}
        <br>
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=>'Foto'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-secondary'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-dark'])!!}
    {{Form::close()}}


@endsection