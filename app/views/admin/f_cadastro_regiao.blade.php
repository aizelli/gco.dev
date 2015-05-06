@extends('templates.default')
@section('conteudo')

<div class="wrapper" role="main">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-12 col-lg-12">
                <h4>logo</h4>
            </div>
        </div>
        <div class="row">
            <div id="menu">
                @if(Auth::check())
                @include('includes.menuadmin')
                @else
                @include('includes.menu')
                @endif
            </div>
        </div>
        <div class="row">
            <div id="corpo">
                <div id="conteudo" class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-sm-10 col-lg-10"><!-- Inicio da area do conteudo -->
                    {{Form::open(array('method'=>'post', 'url'=>'/cadastro/estado'))}}
                    <h3>Estado</h3>
                    <hr />
                    @if ( count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Erro(s) encontrado(s):</strong>
                        <ul>
                            @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (isset($ok))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Registro salvo com sucesso!</strong>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                {{ Form::label('nome_estado', 'Nome do estado*') }}
                                {{ Form::text('nome_estado','',array('class'=>'form-control', 'id'=>'nome_estado')) }}

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group">
                                {{ Form::label('sigla', 'Sigla de abreviação*') }}
                                {{ Form::text('sigla','',array('class'=>'form-control', 'id'=>'sigla')) }}
                            </div>
                        </div>
                    </div>
                    <br />
                    {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Cadastrar Estado')) }}
                    <br /><br />
                    {{Form::close()}}

                    <hr />
                    {{Form::open(array('method'=>'post', 'url'=>'/cadastro/cidade/'))}}
                    <h3>Cidade</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                {{ Form::label('estados', 'Estado*') }}
                                {{ Form::select('estado', $estados, '26', array('class'=>'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                {{ Form::label('nome_cidade', 'Nome da cidade*') }}
                                {{ Form::text('nome_cidade','',array('class'=>'form-control', 'id'=>'nome_cidade')) }}
                            </div>
                        </div>
                    </div>
                    <br />
                    {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Cadastrar Cidade')) }}
                    <br /><br />
                    {{Form::close()}}
                </div><!-- Fim area do conteudo -->
            </div>
        </div>
    </div>
</div>
@stop