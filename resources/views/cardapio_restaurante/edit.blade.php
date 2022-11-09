@extends('layouts.app')
@section('title','Listagem de Restaurantes')
@section('content')
    
    {{Form::open(['route'=>['cardapios.update',$cardapio->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'])}}
    {{Form::label('nome','Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required', 'placeholder'=>'Nome do Prato'])}}
        <br>
        {{Form::label('descricao','Descricao')}}
        {{Form::textarea('descricao','',['class'=>'form-control','required', 'placeholder'=>'Descrição do prato...'])}}
        <br>
        {{Form::label('valor','Valor')}}
        {{Form::number('valor','',['class'=>'form-control','required', 'placeholder'=>'Valor do Prato'])}}
        <br>
        {{Form::label('restaurante_id','Restaurante')}}
        {{Form::text('restaurante_id','',['class'=>'form-control','required', 'placeholder'=>'Selecione o restaurante...', 'list'=>'listrestaurantes'])}}
        <datalist id="listrestaurantes">
            @foreach($restaurantes as $restaurante)
                <option value="{{$restaurante->id}}">{{$restaurante->nome}}</option>
            @endforeach
        </datalist>
        <br>
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=>'Foto'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-secondary'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-dark'])!!}
    {{Form::close()}}

@endsection