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
                        {{Form::open(array('method'=>'post', 'url'=>'admin/cadastro/estado'))}}
                        <h3>Estado</h3>
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
                        @if (isset($ok))
                        <div >
                            <strong>Registro salvo com sucesso!</strong>
                        </div>
                        @endif
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('nome_estado', 'Nome do estado*') }}
                                {{ Form::text('nome_estado','',array('id'=>'nome_estado')) }}

                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-2 columns">
                                {{ Form::label('sigla', 'Sigla de abreviação*') }}
                                {{ Form::text('sigla','',array('id'=>'sigla')) }}
                            </div>
                        </div>
                        {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'button', 'title'=>'Cadastrar Estado')) }}
                        {{Form::close()}}

                        <hr />
                        {{Form::open(array('method'=>'post', 'url'=>'admin/cadastro/cidade/'))}}
                        <h3>Cidade</h3>
                        <hr />
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('estados', 'Estado*') }}
                                {{ Form::select('estado', $estados, '') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('nome_cidade', 'Nome da cidade*') }}
                                {{ Form::text('nome_cidade','',array('id'=>'nome_cidade')) }}
                            </div>
                        </div>
                        {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'button', 'title'=>'Cadastrar Cidade')) }}

                        {{Form::close()}}
                    </div>
                </div>
            </section>

            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>
@stop