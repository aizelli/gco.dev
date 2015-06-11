@extends('templates.default')
@section('conteudo')
<div class="row">
    <div class="off-canvas-wrap" data-offcanvas>
        <div class="inner-wrap">
            <nav class="tab-bar">
                <section class="left-small">
                    <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
                </section>

                <section class="middle tab-bar-section">
                    <h1 class="title">Painel Administrativo</h1>
                </section>
            </nav>
            <aside class="left-off-canvas-menu">
                <ul class="off-canvas-list">
                    <li><label>Cadastros</label></li>
                    <li><a href="{{URL::to('admin/cadastro/usuario')}}">Usuários</a></li>
                    <li><a href="{{URL::to('admin/cadastro/empresa')}}">Empresas</a></li>
                    <li><a href="{{URL::to('admin/cadastro/categoria')}}">Categorias</a></li>
                    <li><a href="{{URL::to('admin/cadastro/regiao')}}">Regiões</a></li>
                </ul>
                <ul class="off-canvas-list">
                    <li><label>Gerenciar</label></li>
                    <li><a href="{{URL::to('admin/listar/usuarios')}}">Usuários</a></li>
                    <li><a href="{{URL::to('admin/listar/empresas')}}">Empresas</a></li>
                    <li><a href="{{URL::to('admin/listar/categorias')}}">Categorias</a></li>
                    <li><a href="{{URL::to('admin/listar/regioes')}}">Regiões</a></li>
                </ul>
            </aside>
            <section class="main-section" style="min-height: 500px">
                <div class="row">
                    <div class="medium-12 columns">
                        {{Form::open(array('method'=>'post', 'url'=>'admin/cadastro/usuario'))}}
                        <h3>Dados do Usuário</h3>
                        <hr />
                        @if ( count($errors) > 0)
                        <div>
                            <strong>Erro(s) encontrado(s):</strong>
                            <ul>
                                @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                            <div class="medium-6 columns">
                                {{ Form::label('nome', 'Nome Completo*') }}
                                {{ Form::text('nome','',array('id'=>'nome')) }}
                            </div>
                            <div class="medium-6 columns">
                                {{ Form::label('email', 'E-mail') }}
                                {{ Form::text('email','',array('id'=>'email')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-6 columns">
                                {{ Form::label('senha', 'Senha*') }}
                                {{ Form::password('senha',array('id'=>'senha')) }}
                            </div>
                            <div class="medium-6 columns">
                                {{ Form::label('re-senha', 'Confirmar Senha*') }}
                                {{ Form::password('re-senha',array('id'=>'re-senha')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-6 columns">
                                {{ Form::label('usuario', 'Usuário') }}
                                {{ Form::text('usuario','',array('id'=>'usuario')) }}
                            </div>
                            <div class="medium-6 columns">
                                {{ Form::label('nivel', 'Nivel*') }}
                                {{Form::select('nivel', array(
                                    '0'=>'Funcionário',
                                    '9'=>'Administrador'
                                    ), '0')}}
                            </div>
                        </div>
                        <p><small><i>OBS: Os campos marcados com * são obrigatórios.</i></small></p>

                        {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'button', 'title'=>'Cadastrar Usuário')) }}

                        {{Form::close()}}
                    </div>
                </div>
            </section>

            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>
@stop
