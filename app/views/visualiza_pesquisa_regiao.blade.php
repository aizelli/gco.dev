@extends('templates.default')
@section('conteudo')

<div class="row">
    <div class="medium-2 columns">
        <a href="{{URL::to('/')}}"><img src="{{ URL::to('/')}}/img/logo2.png" class="img-responsive"/></a>
    </div>
    <div class="medium-10 columns form-pesquisa">
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
                <button class="button tiny radius" title="Pesquisar" type="submit"><i class="fi-magnifying-glass pesquisa"></i></button>

            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
<div class="row">
    <div class="medium-12 columns">
        <ul class="bxslider">
            <li><img src="{{ URL::to('/')}}/img/banner/1.jpg" /></li>
            <li><img src="{{ URL::to('/')}}/img/banner/2.jpg" /></li>
            <li><img src="{{ URL::to('/')}}/img/banner/3.jpg" /></li>
            <li><img src="{{ URL::to('/')}}/img/banner/4.jpg" /></li>
            <li><img src="{{ URL::to('/')}}/img/banner/4.jpg" /></li>
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
                    <div class="row">
                        <div class="medium-12 columns">
                            1
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            2
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            3
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            4
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            5
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            6
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            7
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            8
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-12 columns">
                            9
                        </div>
                    </div>                    
                </div>
            </div> <!-- Fim area do sidebar -->
        </div>
    </div>
</div>
@stop