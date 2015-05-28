@extends('templates.default')
@section('conteudo')

<div class="wrapper" role="main">
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div id="logo" class="col-md-2 col-lg-2">
                <img src="{{ URL::to('/')}}/img/banner/1.jpg" class="img-responsive"/>
            </div>
            <div class="col-md-10 col-lg-10">
                {{Form::open(array('method'=>'get', 'url'=>'/pesquisa', 'class'=>'form-inline'))}}
                <div class="form-group">
                    {{ Form::text('pesquisa','',array('class'=>'form-control input-lg', 'id'=>'procura', 'placeholder'=>'Encontre aqui')) }}
                </div>
                <div class="form-group">
                    {{ Form::select('uf', $uf, 0, array('class'=>'form-control input-lg')) }}
                </div>
                <div class="form-group">
                    {{ Form::select('cidade', array('0'=>'Selecione'), '', array('class'=>'form-control input-lg')) }}
                </div>
                <div class="form-group">
                    {{ Form::button('Pesquisar', array('type'=>'submit', 'class'=>'btn btn-default btn-lg', 'title'=>'Pesquisar')) }}
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
                <div class="col-md-2 col-lg-2">
                    <div id="categorias_titulo">
                        <h4 class="text-center">Categorias</h4>
                    </div>
                    <div id="categoria_conteudo">
                        <ul >
                            @foreach($categorias as $c)
                            <li>
                                <a href="#" >{{$c->name}}</a>
                                <ul>
                                    @foreach($c->getDescendants() as $descendant) 
                                    <li>
                                        <a href="#">{{$descendant->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8"><!-- Inicio da area do conteudo -->
                    <div class="row">
                        <div id="conteudo" >
                            <div class="col-md-12 col-lg-12">
                                <h4>Empresas em destaque</h4>

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