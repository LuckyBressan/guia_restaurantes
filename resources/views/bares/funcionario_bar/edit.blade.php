@extends('layouts.app')
@section('title','Editar Informações')
@section('content')
    <h1>Editar Informações</h1>
    <hr>
    {{Form::open(['route'=>['funcionariosBar.update',$funcionario->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'])}}
    {{Form::label('nome','Nome')}}
        {{Form::text('nome',$funcionario->nome,['class'=>'form-control','required', 'placeholder'=>'Nome do Funcionário'])}}
        <br>
        {{Form::label('idade','Idade')}}
        {{Form::number('idade',$funcionario->idade,['class'=>'form-control','required', 'placeholder'=>'Idade do Funcionário'])}}
        <br>
        {{Form::label('bar_id','Bares')}}
        {{Form::text('bar_id',$funcionario->bar_id,['class'=>'form-control','required', 'placeholder'=>'Selecione o bar...', 'list'=>'listbares'])}}
        <datalist id="listbares">
            @foreach($bares as $bar)
                <option value="{{$bar->id}}">{{$bar->nome}}</option>
            @endforeach
        </datalist>
        <br>
        {{Form::label('funcao','Funcao')}}
        {{Form::text('funcao',$funcionario->funcao,['class'=>'form-control','required', 'placeholder'=>'Informe a função...'])}}
        <br>
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=>'Foto'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-secondary'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-dark'])!!}
    {{Form::close()}}

@endsection