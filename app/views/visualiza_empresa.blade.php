@extends('templates.default')
@section('conteudo')

<div class="wrapper" role="main">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-2 col-lg-2">
                <a href="{{URL::to('/')}}"><img src="{{ URL::to('/')}}/img/banner/1.jpg" class="img-responsive"/></a>
            </div>
            <div class="col-md-10 col-lg-10">
                {{Form::open(array('method'=>'get', 'url'=>'/pesquisa', 'class'=>'form-inline'))}}
                <div class="form-group">
                    {{ Form::text('pesquisa','',array('class'=>'form-control ', 'id'=>'procura', 'placeholder'=>'Encontre aqui')) }}
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
                    {{ Form::button('Pesquisar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Pesquisar')) }}
                </div>
                {{Form::close()}}
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
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <div id="categorias_titulo">
                        <h4 class="text-center">Categorias</h4>
                    </div>
                    <div id="categoria_conteudo">
                        <ul >
                            @foreach($categorias as $c)
                            <li>
                                <a href="{{URL::to('/')}}/pesquisa/categoria/{{$c->id}}" >{{$c->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="conteudo" class="col-md-8 col-sm-8 col-xs-10"><!-- Inicio da area do conteudo -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @foreach($empresa as $e)
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <img src="{{URL::to('/')}}/img/empresas/{{$e->razao_social}}/arte_{{$e->razao_social}}.jpg" alt="{{$e->razao_social}}" class="art-det img-responsive">
                                </div>
                                <div class="col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5">
                                    <h3>{{strtoupper($e->nome_emp)}}</h3>
                                    <ul>
                                        <li><span class="glyphicon glyphicon-map-marker"></span> {{ucwords($e->endereco)}} - {{ucwords($e->bairro)}} - CEP {{substr($e->cep, 0, 5)}}-{{substr($e->cep, 5, 3)}} | {{ucwords($e->nome)}} - {{$e->sigla}}</li>
                                        <li><span class="glyphicon glyphicon-phone-alt"></span>
                                            ({{substr($e->telefone1, 0,2)}}) {{substr($e->telefone1, 2,4)}}-{{substr($e->telefone1, 6,4)}}
                                            @if($e->telefone2 != null && $e->telefone2 != 0)
                                            / ({{substr($e->telefone2, 0,2)}}) {{substr($e->telefone2, 2,4)}}-{{substr($e->telefone2, 6,4)}}
                                            @endif
                                            @if($e->celular != null && $e->celular != 0)
                                            / ({{substr($e->celular, 0,2)}}) {{substr($e->celular, 2,5)}}-{{substr($e->celular, 7,4)}}
                                            @endif
                                        </li>
                                        <li><span class="glyphicon glyphicon-envelope"></span> {{$e->email}}</li>
                                    </ul>
                                    <h4>Redes sociais</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li role="presentation" class="active"><a href="#">Sobre Nós</a></li>
                                        <li role="presentation"><a href="#">Fotos</a></li>
                                        <li role="presentation"><a href="#">Mapa</a></li>
                                    </ul>
                                    <div id="sobre" class="panel panel-body panel-default">
                                        <p>{{$e->descricao}}</p>
                                    </div>
                                    <div id="fotos" class="panel panel-body panel-default">

                                    </div>
                                    <div id="map-canvas" class="panel panel-body panel-default">
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- Fim area do conteudo -->
                <div id="sidebar" class="col-md-2 col-sm-2 hidden-xs"> <!-- Inicio do sidebar -->
                    Sidebar - publicidade
                </div> <!-- Fim area do sidebar -->
            </div>
        </div>
    </div>
</div>
@stop