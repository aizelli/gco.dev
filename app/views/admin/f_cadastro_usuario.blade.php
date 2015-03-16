@extends('templates.default')
@section('conteudo')

<div>
    @include('includes.menu')
</div>

<div class="wrapper" role="main">
    <div class="container">
        <div class="row">
            <div id="conteudo" class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-sm-10 col-lg-10"><!-- Inicio da area do conteudo -->
                {{Form::open(array('method'=>'post', 'url'=>'/usuario/cadastro'))}}
                <h3>Dados do Usuário</h3>
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
                            {{ Form::label('nome', 'Nome Completo*') }}
                            {{ Form::text('nome','',array('class'=>'form-control', 'id'=>'nome')) }}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail') }}
                            {{ Form::text('email','',array('class'=>'form-control', 'id'=>'email')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('senha', 'Senha*') }}
                            {{ Form::password('senha',array('class'=>'form-control', 'id'=>'senha')) }}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('re-senha', 'Confirmar Senha*') }}
                            {{ Form::password('re-senha',array('class'=>'form-control', 'id'=>'re-senha')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('usuario', 'Usuário') }}
                            {{ Form::text('usuario','',array('class'=>'form-control', 'id'=>'usuario')) }}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            {{ Form::label('nivel', 'Nivel*') }}
                            {{Form::select('nivel', array(
                                    '0'=>'Funcionário',
                                    '9'=>'Administrador'
                                    ), '0', array('class'=>'form-control'))}}
                        </div>
                    </div>
                </div>
                <p class="small"><i>OBS: Os campos marcados com * são obrigatórios.</i></p>
                <br />
                {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Cadastrar Usuário')) }}
                <br /><br />
                {{Form::close()}}
            </div><!-- Fim area do conteudo -->
        </div>
    </div>
</div>
@stop