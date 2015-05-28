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
                    {{Form::open(array('method'=>'post', 'url'=>"admin/cadastro/empresa/dados_adicionais/$id", 'files'=>true))}}
                    <h3>Informações Adicionais</h3>
                    <hr />
                    <h4>Redes Sociais</h4>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('face', 'Facebook') }}
                                {{ Form::text('face','',array('class'=>'form-control', 'id'=>'face')) }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('google', 'Google+') }}
                                {{ Form::text('google','',array('class'=>'form-control', 'id'=>'google')) }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('twitter', 'Twitter') }}
                                {{ Form::text('twitter','',array('class'=>'form-control', 'id'=>'twitter')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('isntagran', 'Instagran') }}
                                {{ Form::text('isntagran','',array('class'=>'form-control', 'id'=>'isntagran')) }}
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('needid', 'Needid') }}
                                {{ Form::text('needid','',array('class'=>'form-control', 'id'=>'needid')) }}
                            </div>
                        </div>
                    </div>
                    <hr />
                    <h4>Arte/Imagens</h4>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('arte', 'Arte principal') }}
                                {{ Form::file('arte', array('id'=>'arte')) }}
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                {{ Form::label('img1', 'Imagem 1') }}
                                {{ Form::file('img1', array('id'=>'img1')) }}
                            </div>
                        </div>
                    </div>
                     <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            {{ Form::label('img2', 'Imagem 2') }}
                            {{ Form::file('img2', array('id'=>'img2')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            {{ Form::label('img3', 'Imagem 3') }}
                            {{ Form::file('img3', array('id'=>'img3')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            {{ Form::label('img4', 'Imagem 4') }}
                            {{ Form::file('img4', array('id'=>'img4')) }}
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            {{ Form::label('img5', 'Imagem 5') }}
                            {{ Form::file('img5', array('id'=>'img5')) }}
                        </div>
                    </div>
                </div>
                <br />
                {{ Form::button('Finalizar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Salvar informações adicionais')) }}
                <br /><br />
                {{Form::close()}}
            </div><!-- Fim area do conteudo -->
        </div>
    </div>
</div>
</div>
@stop