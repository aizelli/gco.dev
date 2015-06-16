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
                        {{Form::open(array('method'=>'post', 'url'=>"admin/empresa/imagens/$id", 'files'=>true))}}

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
                        <div>
                            <strong>Registro atualizado com sucesso!</strong>
                        </div>
                        @endif
                        {{Form::open(array('method'=>'post', 'url'=>"admin/empresa/imagens/$id", 'files'=>true))}}

                        <h4>Arte/Imagens</h4>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('arte', 'Arte principal') }}
                                {{ Form::file('arte', array('id'=>'arte')) }}
                            </div>
                            <div class="medium-4 columns end">
                                {{ Form::label('img1', 'Imagem 1') }}
                                {{ Form::file('img1', array('id'=>'img1')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('img2', 'Imagem 2') }}
                                {{ Form::file('img2', array('id'=>'img2')) }}
                            </div>
                            <div class="medium-4 columns end">
                                {{ Form::label('img3', 'Imagem 3') }}
                                {{ Form::file('img3', array('id'=>'img3')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('img4', 'Imagem 4') }}
                                {{ Form::file('img4', array('id'=>'img4')) }}
                            </div>
                            <div class="medium-4 columns end">
                                {{ Form::label('img5', 'Imagem 5') }}
                                {{ Form::file('img5', array('id'=>'img5')) }}
                            </div>
                        </div>
                        {{Form::button('Salvar', array('type'=>'submit', 'class'=>'button', 'title'=>'Salvar alterações'))}}
                        {{Form::close()}}
                    </div>
            </section>
            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>
@stop