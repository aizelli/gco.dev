@extends('templates.default')
@section('conteudo')

<div>
    @include('includes.menu')
</div>

<div class="wrapper" role="main">
    <div class="container">
        <div class="row">
            <div id="conteudo" class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-sm-10 col-lg-10"><!-- Inicio da area do conteudo -->
                {{Form::open(array('method'=>'post', 'url'=>'/categoria/cadastro'))}}
                <h3>Categoria Principal</h3>
                <hr />
                @if ( count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <strong>Erro(s) encontrado(s):</strong>
                    <ul>
                        @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('nome', 'Nome da categoria*') }}
                            {{ Form::text('nome','',array('class'=>'form-control', 'id'=>'nome')) }}
                        </div>
                    </div>
                </div>
                <br />
                {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Cadastrar categoria')) }}
                <br /><br />
                {{Form::close()}}
                
                <hr />
                {{Form::open(array('method'=>'post', 'url'=>'/subcategoria/cadastro'))}}
                <h3>Sub-Categoria</h3>
                <hr />
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('categoria', 'Categoria*') }}
                            {{ Form::select('categoria', $categorias, '', array('class'=>'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('subcategaria', 'Nome da Subcategoria*') }}
                            {{ Form::text('subcategoria','',array('class'=>'form-control', 'id'=>'sub')) }}
                        </div>
                    </div>
                </div>
                <br />
                {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Cadastrar Subcategoria')) }}
                <br /><br />
                {{Form::close()}}
            </div><!-- Fim area do conteudo -->
        </div>
    </div>
</div>
@stop