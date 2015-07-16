@extends('templates.default')
@section('conteudo')
<div class="row">
    <div class="medium-2 columns">
        <a href="{{URL::to('/')}}"><img src="{{ URL::to('/')}}/img/logo2.png" alt="GuiaWebRegiao"/></a>
    </div>
    <div class="medium-10 columns" >
        <div class="form-pesquisa" style="background-color: #2D4E98">
            <div class="row">
                {{Form::open(array('method'=>'get', 'url'=>'/pesquisa'))}}
                <div class="medium-3 columns">
                    {{ Form::text('pesquisa','',array('id'=>'procura', 'placeholder'=>'Encontre aqui')) }}
                </div>
                <div class="medium-4 columns">
                    <div class="row collapse prefix-radius">
                        <div class="medium-3 columns">
                            <span class="prefix">Estado</span>
                        </div>
                        <div class="medium-9 columns">
                            {{ Form::select('uf', $uf, 0, array('id'=>'uf')) }}
                        </div>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div class="row collapse prefix-radius">
                        <div class="medium-3 columns">
                            <span class="prefix">Cidade</span>
                        </div>
                        <div class="medium-9 columns">
                            {{Form::select('cidade', array('0'=>'Selecione o estado'), '', array('id'=>'cidade'))}}
                        </div>
                    </div>
                </div>
                <div class="medium-1 columns">
                    <button class="button tiny radius alert" title="Pesquisar" type="submit"><i class="fi-magnifying-glass pesquisa"></i></button>

                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="medium-12 columns">
        <ul class="bxslider">
            <li><a href="{{URL::to('/')}}/empresa/detalhes/18"><img src="{{URL::to('/')}}/img/banner/1.jpg" alt="Sit - Escolas de Profissões"/></a></li>
            <li><a href="{{URL::to('/')}}/empresa/detalhes/19"><img src="{{URL::to('/')}}/img/banner/2.jpg" alt="Pernanbucanas"/></a></li>
            <li><a href="{{URL::to('/')}}/empresa/detalhes/17"><img src="{{URL::to('/')}}/img/banner/3.jpg" alt="GamaEmpregos.com.br"/></a></li>
            <li><a href="{{URL::to('/')}}/empresa/detalhes/6"><img src="{{URL::to('/')}}/img/banner/4.jpg" alt="Ferraz Extintores"/></a></li>
            <li><img src="{{URL::to('/')}}/img/banner/5.jpg" alt="Anuncio Topo 5"/></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="medium-2 columns"><!-- Inicio da lateral de categorias -->
        <div id="lateral-esquerda" class="text-center">
            <br />
            <h4 ><strong>Categorias</strong></h4>
            <hr />
            <div id="menu">
                <ul class="no-bullet">
                    @foreach($categorias as $c)
                    <li>
                        <a href="{{URL::to('/')}}/pesquisa/categoria/{{$c->id}}" class="item-menu">{{ucwords($c->name)}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div><!-- Fim da lateral de categorias -->
    <div id="conteudo" class="medium-8 columns text-justify"><!-- Inicio da area do conteudo -->
        <h3>Quem Somos</h3>
        <h4>A ideia</h4>
        <p>
            O site GuiaWebRegiao.com.br foi criado com a ideia de reunir as informações sobre todos os estabelecimentos e profissionais da região em um só lugar.
            Proporcionando tanto para as empresas como para a populção um guia prático e rápido de produtos e serviços através da internet.
        </p>
        <h4>A empresa</h4>
        <p>
            A marcar Guia Web Região pertence a empresa Tecla Certa Informártica e Personalização, que atua a mais de 5 anos nas áreas de tecnologia, artes gráficas e desenvolvimentos de sistemas, 
            sempre fornecendo produtos e serviços de alta qualidade.
        </p>
    </div><!-- Fim area do conteudo -->
    <div class="medium-2 columns"> <!-- Inicio do lateral parceiros -->
        <div id="lateral-direita" class="text-center">
            <br />
            <h4 ><strong>Parceiros</strong></h4>
            <hr />
            <div class="lateral">
                <div class="row">
                    <div class="medium-12 columns">
                        <a href="{{URL::to('/')}}/empresa/detalhes/10"><img src="{{URL::to('/')}}/img/lateral/rosadu_lateral.jpg" alt="Rosa Du - Loja"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <a href="{{URL::to('/')}}/empresa/detalhes/12"><img src="{{URL::to('/')}}/img/lateral/oliveiralocacoes_lateral.jpg" alt="Oliveira Locações"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <a href="{{URL::to('/')}}/empresa/detalhes/15"><img src="{{URL::to('/')}}/img/lateral/engadriano_lateral.jpg" alt="Eng. Adriano BAratelli"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <a href="{{URL::to('/')}}/empresa/detalhes/28"><img src="{{URL::to('/')}}/img/lateral/km_eletrica_lateral.jpg" alt="KM Elétrica e Hidráulica" /></a>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <a href="{{URL::to('/')}}/empresa/detalhes/32"><img src="{{URL::to('/')}}/img/lateral/katrina_lateral.jpg" alt="Katrina Fisioterapeuta"/></a>
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 6" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 7" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 8" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 9" />
                    </div>
                </div>   
            </div>
        </div>
    </div> <!-- Fim area do da lateral parceiros -->
</div>
@stop