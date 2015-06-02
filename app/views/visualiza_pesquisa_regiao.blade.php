@extends('templates.default')
@section('conteudo')

<div class="wrapper" role="main">
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div id="logo" class="col-md-2 col-lg-2">
                <a href="{{ URL::to('/')}}"><img src="{{ URL::to('/')}}/img/banner/1.jpg" class="img-responsive"/></a>
            </div>
            <div class="col-md-10 col-lg-10">
                
            </div>
        </div>
        <div>
            <br />
        </div>
        <div class="row">
            <div id="slide_topo">
                <ul class="bxslider">
                    <li><img src="{{ URL::to('/')}}/img/banner/1.jpg" class="img-responsive"/></li>
                    <li><img src="{{ URL::to('/')}}/img/banner/2.jpg" class="img-responsive"/></li>
                    <li><img src="{{ URL::to('/')}}/img/banner/3.jpg" class="img-responsive"/></li>
                    <li><img src="{{ URL::to('/')}}/img/banner/4.jpg" class="img-responsive"/></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="corpo">
                <div class="col-md-2 col-lg-2">
                    <div id="categorias_titulo">
                        <h4 class="text-center">Filtros</h4>
                    </div>
                    <div id="categoria_conteudo">
                        {{Form::open(array('method'=>'get', 'url'=>'pesquisa/regiao'))}}
                        
                        <div class="form-group">
                            {{ Form::label('pesquisa', 'Nome') }}
                            {{ Form::text('pesquisa','',array('class'=>'form-control ', 'id'=>'procura')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('cat', 'Categorias') }}
                            {{ Form::select('cat', $categorias, 0, array('class'=>'form-control ', 'id'=>'cat')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('sub', 'Sub-categorias') }}
                            {{ Form::select('sub', $categorias, 0, array('class'=>'form-control ', 'id'=>'sub')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('uf', 'Estado') }}
                            {{ Form::select('uf', $uf, 0, array('class'=>'form-control ', 'id'=>'uf')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('cidade', 'Cidade') }}
                            {{ Form::select('cidade', array('0'=>'Selecione'), '', array('class'=>'form-control ')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::button('Redefinir', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Redefinir pesquisa')) }}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <div class="col-md-8 col-lg-8"><!-- Inicio da area do conteudo -->
                    <div class="row">
                        <div id="conteudo" >
                            <div class="col-md-12 col-lg-12">
                                <h4>Resultado</h4>

                                <div id="empresas">
                                    <div class="row">
                                        {{$tabela}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- Fim area do conteudo -->
                <div class="col-md-2 col-lg-2"> <!-- Inicio do sidebar -->
                    <div id="sidebar">
                        Sidebar - publicidade
                    </div>
                </div> <!-- Fim area do sidebar -->
            </div>
        </div>
    </div>
</div>
@stop