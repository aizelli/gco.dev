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
        {{Form::open(array('method'=>'post', 'url'=>'/enviar_mensagem'))}}
        @if ( count($errors) > 0)
                <div data-alert class="alert-box danger radius" >
                    <strong>Erro(s) encontrado(s):</strong>
                    <ul>
                        @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    <a href="#" class="close">&times;</a>
                </div>
                @endif
                @if(isset($sucesso))
                <div data-alert class="alert-box success radius">
                    <strong>Obrigado por entrar em contato conosco!</strong>
                    <strong>Em breve entraremos em contato.</strong>
                    <a href="#" class="close">&times;</a>
                </div>
                @endif
        <div class="row">
            <div class="medium-8 columns">
                {{ Form::label('nome', 'Nome') }}
                {{ Form::text('nome','',array('id'=>'nome')) }}
            </div>
        </div>
        <div class="row">
            <div class="medium-8 columns">
                {{ Form::label('email', 'E-mail') }}
                {{ Form::text('email','',array('id'=>'email')) }}
            </div>
        </div>
        <div class="row">
            <div class="medium-8 columns">
                {{ Form::label('assunto', 'Assunto') }}
                {{ Form::text('assunto','',array('id'=>'assunto')) }}
            </div>
        </div>
        <div class="row">
            <div class="medium-8 columns">
                {{ Form::label('mensagem', 'Mensagem') }}
                {{ Form::textarea('mensagem', null, array('rows'=>'6','id'=>'mensagem')) }}
            </div>
        </div>
        <br />
        {{Form::button('Enviar', array('type'=>'submit', 'class'=>'button', 'title'=>'Enviar Mensagem'))}}
        {{Form::close()}}
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