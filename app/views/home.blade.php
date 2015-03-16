@extends('templates.default')
@section('conteudo')

<div>
    @include('includes.menu')
</div>

<div class="wrapper" role="main">
    <div class="container">
        <div class="row">
            <div id="slide_topo" class="col-md-12 col-sm-12 hidden-xs">
                <h4>Slide Topo</h4>
            </div>
        </div>
        <div class="row">
            <div id="categorias" class="col-md-2 col-sm-2 col-xs-2 list-group">
                <h4>Categorias</h4>
                @foreach($categorias as $c)
                    <li class="list-group-item active">
                        {{$c->name}} <span class="caret"></span>
                    </li>
                        @foreach($c->getDescendants() as $descendant) 
                        <a href="#" class="list-group-item">
                            {{$descendant->name}}
                        </a>
                        @endforeach
                @endforeach
            </div>
            <div id="conteudo" class="col-md-8 col-sm-8 col-xs-10"><!-- Inicio da area do conteudo -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h4>Empresas em destaque</h4>
                        @foreach($empresas as $e)
                        <div class="row">
                            <div class="col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5">
                                <a href="{{URL::to('/empresa/detalhes/'.$e->id)}}">
                                    imagem do cartão de visitas<br />+ Detalhes
                                </a>
                            </div>
                            <div class="col-md-5 col-sm-5">
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
            <div id="sidebar" class="col-md-2 col-sm-2 hidden-xs"> <!-- Inicio do sidebar -->
                Sidebar - publicidade
            </div> <!-- Fim area do sidebar -->
        </div>
    </div>
</div>
@stop