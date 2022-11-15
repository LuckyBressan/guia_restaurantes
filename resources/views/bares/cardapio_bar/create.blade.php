@extends('layouts.app')
@section('title','Registro de Cardápio')
@section('content')
    <h1>Registro de Cardápio</h1>
    <hr>

    {{Form::open(['route'=>'cardapiosBar.store','method'=>'POST', 'enctype'=>'multipart/form-data'])}}
    
        {{Form::label('nome','Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required', 'placeholder'=>'nome'])}}
        <br>

        {{Form::label('descricao','Descricao')}}
        {{Form::textarea('descricao','',['class'=>'form-control','required', 'placeholder'=>'descrição'])}}
        <br>

        {{Form::label('valor','Valor')}}
        {{Form::number('valor','',['class'=>'form-control','required', 'placeholder'=>'valor'])}}
        <br>

        {{Form::label('bar_id','Bares')}}
        {{Form::text('bar_id','',['class'=>'form-control','required', 'placeholder'=>'Selecione o bar...', 'list'=>'listbares'])}}
        <datalist id="listbares">
            @foreach($bares as $bar)
                <option value="{{$bar->id}}">{{$bar->nome}}</option>
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