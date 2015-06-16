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
                        <div class="medium-9 columns" style="">
                            {{ Form::select('cidade', array('0'=>'Selecione o estado'), '', array('id'=>'cidade')) }}
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
            <li><img src="{{URL::to('/')}}/img/banner/1.jpg" alt="Anuncio Topo 1"/></li>
            <li><img src="{{URL::to('/')}}/img/banner/2.jpg" alt="Anuncio Topo 2"/></li>
            <li><img src="{{URL::to('/')}}/img/banner/3.jpg" alt="Anuncio Topo 3"/></li>
            <li><img src="{{URL::to('/')}}/img/banner/4.jpg" alt="Anuncio Topo 4"/></li>
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
                    <h4 ><strong>Filtros</strong></h4>
                    <hr />
                    {{Form::open(array('method'=>'get', 'url'=>'/pesquisa'))}}

                    {{ Form::label('pesquisa', 'Nome', array('class'=>'text-left')) }}
                    {{ Form::text('pesquisa','',array('id'=>'procura_fil')) }}

                    {{ Form::label('cat', 'Categorias', array('class'=>'text-left')) }}
                    {{ Form::select('cat', array('0'=>'Todos',$categorias), '', array('id'=>'cat_fil')) }}

                    {{ Form::label('sub', 'Sub-categorias', array('class'=>'text-left')) }}
                    {{ Form::select('sub', array('0'=>'Todos'), '', array('id'=>'sub_fil')) }}

                    {{ Form::label('uf', 'Estado', array('class'=>'text-left')) }}
                    {{ Form::select('uf', $estados, '', array('id'=>'uf_fil')) }}

                    {{ Form::label('cidade', 'Cidade', array('class'=>'text-left')) }}
                    {{ Form::select('cidade', array('0'=>'Todos'), '', array('id'=>'cidade_fil')) }}
                    <br /><br />
                    {{ Form::button('Filtrar', array('type'=>'submit', 'class'=>'button small expand', 'title'=>'Redefinir pesquisa')) }}

                    {{Form::close()}}
                </div>
            </div>
            <div class="medium-8 columns"><!-- Inicio da area do conteudo -->
                <div class="row">
                    <h3>Resultado </h3>

                    {{$tabela}}
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
                                <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-12 columns">
                                <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 3" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-12 columns">
                                <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 4" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-12 columns">
                                <img src="{{URL::to('/')}}/img/lateral/1.jpg" alt="Parceiros 5" />
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