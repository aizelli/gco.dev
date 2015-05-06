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
                <div id="categorias" class="col-md-2 col-lg-2">
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
                <div id="conteudo" class="col-md-8 col-lg-8"><!-- Inicio da area do conteudo -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h4>Empresas em destaque</h4>
                            @foreach($empresas as $e)
                            <div class="row">
                                <div class="col-md-offset-1 col-lg-offset-1 col-md-5 col-lg-5">
                                    <a href="{{URL::to('/empresa/detalhes/'.$e->id)}}">
                                        {{ HTML::image(URL::to('/').'/img/empresa/'.$e->id.'/img_cartao.jpg',$e->nome_emp , array('class' => 'img-responsive')) }}
                                    </a>
                                </div>
                                <div class="col-md-5 col-lg-5">
                                    <ul>
                                        <li>{{$e->nome_emp}}</li>
                                        <li>{{$e->endereco}}</li>
                                        <li>{{$e->bairro}}</li>
                                        <li>{{$e->cidade}}</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div><!-- Fim area do conteudo -->
                <div id="sidebar" class="col-md-2 col-lg-2"> <!-- Inicio do sidebar -->
                    Sidebar - publicidade
                </div> <!-- Fim area do sidebar -->
            </div>
        </div>
    </div>
</div>
@stop