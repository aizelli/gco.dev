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
                        {{Form::open(array('method'=>'post', 'url'=>"admin/cadastro/empresa/dados_adicionais/$id", 'files'=>true))}}
                        <h3>Informações Adicionais</h3>
                        <hr />
                        <h4>Redes Sociais</h4>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('site', 'Site') }}
                                {{ Form::text('site','',array('id'=>'site')) }}
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('face', 'Facebook') }}
                                {{ Form::text('face','',array('id'=>'face')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('google', 'Google+') }}
                                {{ Form::text('google','',array('id'=>'google')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('twitter', 'Twitter') }}
                                {{ Form::text('twitter','',array('id'=>'twitter')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('istagram', 'Istagram') }}
                                {{ Form::text('istagram','',array('id'=>'isntagram')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('youtube', 'YouTube') }}
                                {{ Form::text('youtube','',array('id'=>'youtube')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('linkedin', 'Linkedin') }}
                                {{ Form::text('linkedin','',array('id'=>'linkedin')) }}
                            </div>
                        </div>
                        <hr />
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
                        {{ Form::button('Finalizar', array('type'=>'submit', 'class'=>'button', 'title'=>'Salvar informações adicionais')) }}
                        {{Form::close()}}
                    </div><!-- Fim area do conteudo -->
                </div>
            </section>

            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>

@stop