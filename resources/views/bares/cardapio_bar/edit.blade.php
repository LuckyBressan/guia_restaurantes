@extends('layouts.app')
@section('title','Editar Cardápio')
@section('content')
    {{Form::open(['route'=>['cardapiosBar.update',$cardapio->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'])}}

            {{Form::label('nome','Nome')}}
            {{Form::text('nome',$cardapio->nome,['class'=>'form-control','required', 'placeholder'=>'Nome do Prato'])}}
            <br>

            {{Form::label('descricao','Descricao')}}
            {{Form::textarea('descricao',$cardapio->descricao,['class'=>'form-control','required', 'placeholder'=>'Descrição do prato...'])}}
            <br>

            {{Form::label('valor','Valor')}}
            {{Form::number('valor',$cardapio->valor,['class'=>'form-control','required', 'placeholder'=>'Valor do Prato'])}}
            <br>

            {{Form::label('bar_id','Bares')}}
            {{Form::text('bar_id',$cardapio->bar_id,['class'=>'form-control','required', 'placeholder'=>'Selecione o bar...', 'list'=>'listbares'])}}
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