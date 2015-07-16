@extends('templates.default')
@section('conteudo')
<div class="row">
    <div class="medium-2 columns">
        <a href="{{URL::to('/')}}"><img src="{{ URL::to('/')}}/img/logo2.png" alt="GuiaWebRegiao"/></a>
    </div>
    <div class="medium-10 columns">
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
                            {{ Form::select('cidade', array('0'=>'Selecione o estado'), '', array('id'=>'cidade')) }}
                        </div>
                    </div>
                </div>
                <div class="medium-1 columns">
                    <button class="button tiny radius alert" title="Pesquisar" type="submit"><i class="fi-magnifying-glass"></i></button>

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
    <div class="medium-12 columns">
        <div class="row">
            <div class="medium-2 columns">
                <div id="lateral-esquerda" class="text-center">
                    <br />
                    <h4 ><strong>Categorias</strong></h4>
                    <hr />
                    <div id="menu">
                        <ul class="no-bullet">
                            @foreach($categorias as $c)
                            <li>
                                <a href="{{URL::to('/')}}/pesquisa/categoria/{{$c->id}}" >{{ucwords($c->name)}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="medium-8 columns"><!-- Inicio da area do conteudo -->
                <div class="row">
                    <div class="medium-12 columns">
                        @foreach($empresa as $e)
                        <div class="row">
                            <div class="medium-5 columns">
                                <img src="{{URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/arte_{{str_replace(' ', '_', $e->razao_social)}}.jpg" alt="{{$e->razao_social}}" class="art-det">
                            </div>
                            <div class="medium-7 columns">
                                <h3 style="text-transform: uppercase"><strong>{{$e->nome_emp}}</strong></h3>
                                <ul class="no-bullet">
                                    <li><i style="font-size: 1.5rem" class="fi-marker large"></i> {{ucwords($e->endereco)}}, {{$e->numero}}
                                        @if($e->telefone2 != null && $e->telefone2 != 0)
                                         - {{ucwords($e->complemento)}}
                                        @endif
                                         - {{ucwords($e->bairro)}} - CEP {{substr($e->cep, 0, 5)}}-{{substr($e->cep, 5, 3)}} | {{ucwords($e->nome)}} - {{$e->sigla}}</li>
                                    <li><i style="font-size: 1.5rem" class="fi-telephone"></i>
                                        ({{substr($e->telefone1, 0,2)}}) {{substr($e->telefone1, 2,9)}}
                                        @if($e->telefone2 != null && $e->telefone2 != 0)
                                        | ({{substr($e->telefone2, 0,2)}}) {{substr($e->telefone2, 2,9)}}
                                        @endif
                                        @if($e->celular != null && $e->celular != 0)
                                        | ({{substr($e->celular, 0,2)}}) {{substr($e->celular, 2,9)}}
                                        @endif
                                    </li>
                                    @if($e->email != null)
                                    <li><i style="font-size: 1.5rem" class="fi-mail"></i> {{$e->email}}</li>
                                    @endif
                                    @foreach($social as $s)
                                    @if(count($social)>0)
                                    @if($s->site_url != null)
                                    <li><i style="font-size: 1.5rem" class="fi-web"></i> <a href="http://{{$s->site_url}}" target="_blank">{{$s->site_url}}</a></li>
                                    @endif
                                    @endif
                                </ul>
                                @if(count($social)>0)
                                @if($s->link_fb != null)
                                <a href="http://{{$s->link_fb}}" target="_blank" class="webicon facebook"></a>
                                @endif
                                @if($s->link_gp != null)
                                <a href="http://{{$s->link_gp}}" target="_blank" class="webicon googleplus"></a>
                                @endif
                                @if($s->link_tw != null)
                                <a href="http://{{$s->link_tw}}" target="_blank" class="webicon twitter"></a>
                                @endif
                                @if($s->link_li != null)
                                <a href="http://{{$s->link_li}}" target="_blank" class="webicon linkedin"></a>
                                @endif
                                @if($s->link_yt != null)
                                <a href="http://{{$s->link_yt}}" target="_blank" class="webicon youtube"></a>
                                @endif
                                @if($s->link_is != null)
                                <a href="http://{{$s->link_is}}" target="_blank" class="webicon instagram"></a>
                                @endif
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="medium-12 columns">
                                <ul class="accordion" data-accordion>
                                    <li class="accordion-navigation">
                                        <a href="#sobre1">Sobre</a>
                                        <div id="sobre1" class="content ">
                                            <p>{{nl2br($e->descricao)}}</p>
                                        </div>
                                    </li>
                                    <li class="accordion-navigation">
                                        <a href="#fotos1">Fotos</a>
                                        <div id="fotos1" class="content">
                                            <ul class="clearing-thumbs" data-clearing>
                                                <li><a class="th" href="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/01.jpg"><img src="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/miniatura_01.jpg"></a></li>
                                                <li><a class="th" href="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/02.jpg"><img src="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/miniatura_02.jpg"></a></li>
                                                <li><a class="th" href="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/03.jpg"><img src="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/miniatura_03.jpg"></a></li>
                                                <li><a class="th" href="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/04.jpg"><img src="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/miniatura_04.jpg"></a></li>
                                                <li><a class="th" href="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/05.jpg"><img src="{{ URL::to('/')}}/img/empresas/{{str_replace(' ', '_', $e->razao_social)}}/miniatura_05.jpg"></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="accordion-navigation">
                                        <a href="#mapa1">Mapa</a>
                                        <div id="mapa1" class="content active">
                                            {{$mapa['html']}}
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- Fim area do conteudo -->
            <div class="medium-2 columns"> <!-- Inicio do sidebar -->
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
            </div> <!-- Fim area do sidebar -->
        </div>
    </div>
</div>
@stop