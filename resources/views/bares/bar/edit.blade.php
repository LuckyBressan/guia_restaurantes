@extends('layouts.app')
@section('title','Editar Bar')
@section('content')
    
    {{Form::open(['route'=>['bares.update',$bar->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('nome','Nome')}}
        {{Form::text('nome', $bar->nome ,['class'=>'form-control','required', 'placeholder'=>'Nome do Estabelecimento'])}}
        <br>
        {{Form::label('categoria_id','Categoria')}}
        {{Form::text('categoria_id', $bar->categoria_id ,['class'=>'form-control','required', 'placeholder'=>'Selecione a categoria...', 'list'=>'listcategorias'])}}
        <datalist id="listcategorias">
            @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
            @endforeach
        </datalist>
        <br>
        {{Form::label('cidade','Cidade')}}
        {{Form::text('cidade', $bar->cidade,['class'=>'form-control','required', 'placeholder'=>'Nome da Cidade'])}}
        <br>
        {{Form::label('estado','Estado')}}
        {{Form::text('estado', $bar->estado,['class'=>'form-control','required', 'placeholder'=>'Nome do Estado'])}}
        <br>
        {{Form::label('rua','Rua e Número')}}
        {{Form::text('rua', $bar->rua,['class'=>'form-control','required', 'placeholder'=>'Nome da Rua e Número'])}}
        <br>
        {{Form::label('email','e-mail')}}
        {{Form::email('email', $bar->email,['class'=>'form-control','required', 'placeholder'=>'E-mail', 'pattern'=>'[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?'])}}
        <br>
        {{Form::label('telefone','Telefone')}}
        {{Form::text('telefone', $bar->telefone,['class'=>'form-control','required', 'placeholder'=>'(99) 9999-9999', 'pattern'=>'(\([0-9]{2}\))\s([9]{1})?([0-9]{4,5})-([0-9]{4})',
        'title'=>'Número de Telefone Precisa ser no formato(99) 9999-9999'])}}
        <br>
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=>'Foto'])}}
        <br>
        {{Form::label('ambiente1','1º - Foto do Ambiente')}}
        {{Form::file('ambiente1',['class'=>'form-control', 'id'=>'ambiente1'])}}
        <br>
        {{Form::label('ambiente2','2º - Foto do Ambiente')}}
        {{Form::file('ambiente2',['class'=>'form-control', 'id'=>'ambiente2'])}}
        <br>
        {{Form::label('ambiente3','3º - Foto do Ambiente')}}
        {{Form::file('ambiente3',['class'=>'form-control', 'id'=>'ambiente3'])}}
        <br>
        {{Form::label('logo','Logo')}}
        {{Form::file('logo',['class'=>'form-control', 'id'=>'Logo'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-secondary'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-dark'])!!}
    {{Form::close()}}

@endsection