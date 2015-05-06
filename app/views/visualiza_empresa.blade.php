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
            <div id="slide_topo">
                <h4>Slide de publicidade topo</h4>
            </div>
        </div>
        <div class="row">
            <div id="corpo">
                <div id="categorias" class="col-md-2 col-sm-2 col-xs-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4 class="text-center">Categorias</h4></div>
                        <div class="panel-body">
                            <ul >
                                @foreach($categorias as $c)
                                <li>
                                    <a href="#" >{{$c->name}}</a>
                                </li>
                                <!--
                                     @foreach($c->getDescendants() as $descendant) 
                                     <a href="#" class="list-group-item">
                                         {{$descendant->name}}
                                     </a>
                                     @endforeach
                                -->
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="conteudo" class="col-md-8 col-sm-8 col-xs-10"><!-- Inicio da area do conteudo -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h4>{{ucwords($empresa->nome_emp)}}</h4>
                            <div class="row">
                                <div class="col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5">
                                    imagem do cartão de visitas
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <ul>
                                        <li>{{$empresa->endereco}}</li>
                                        <li>{{$empresa->bairro}}</li>
                                        <li>{{$empresa->cidade}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li role="presentation" class="active"><a href="#">Sobre Nós</a></li>
                                        <li role="presentation"><a href="#">Fotos</a></li>
                                    </ul>
                                    <div id="sobre" class="panel panel-body panel-default">
                                        <p>{{$empresa->descricao}}</p>
                                    </div>
                                    <div id="fotos">

                                    </div>
                                </div>
                            </div>
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