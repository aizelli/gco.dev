@extends('templates.default')
@section('conteudo')
<div class="row">
    <div class="medium-2 columns">
        <img src="{{ URL::to('/')}}/img/logo2.png"/>
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
            <li><img src="{{URL::to('/')}}/img/banner/1.jpg" /></li>
            <li><img src="{{URL::to('/')}}/img/banner/2.jpg" /></li>
            <li><img src="{{URL::to('/')}}/img/banner/3.jpg" /></li>
            <li><img src="{{URL::to('/')}}/img/banner/4.jpg" /></li>
            <li><img src="{{URL::to('/')}}/img/banner/5.jpg" /></li>
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
    <div class="medium-8 columns"><!-- Inicio da area do conteudo -->
        <div class="row">
            <h3>Destaques</h3>

            {{$tabela}}
        </div>
    </div><!-- Fim area do conteudo -->
    <div class="medium-2 columns"> <!-- Inicio do lateral parceiros -->
        <div id="lateral-direita" class="text-center">
            <br />
            <h4 ><strong>Parceiros</strong></h4>
            <hr />
            <div class="lateral">
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <img src="{{URL::to('/')}}/img/lateral/1.jpg" />
                    </div>
                </div>   
            </div>
        </div>
    </div> <!-- Fim area do da lateral parceiros -->
</div>
@stop