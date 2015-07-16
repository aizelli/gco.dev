@extends('templates.default')
@section('conteudo')

<div class="row">
    <div class="off-canvas-wrap" data-offcanvas>
        <div class="inner-wrap">
            <nav class="tab-bar">
                <section class="left-small">
                    <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
                </section>

                <section class="middle tab-bar-section">
                    <h1 class="title">Painel Administrativo</h1>
                </section>
            </nav>
            <aside class="left-off-canvas-menu">
                <ul class="off-canvas-list">
                    <li><label>Cadastros</label></li>
                    <li><a href="{{URL::to('admin/cadastro/usuario')}}">Usuários</a></li>
                    <li><a href="{{URL::to('admin/cadastro/empresa')}}">Empresas</a></li>
                    <li><a href="{{URL::to('admin/cadastro/categoria')}}">Categorias</a></li>
                    <li><a href="{{URL::to('admin/cadastro/regiao')}}">Regiões</a></li>
                </ul>
                <ul class="off-canvas-list">
                    <li><label>Gerenciar</label></li>
                    <li><a href="{{URL::to('admin/listar/usuarios')}}">Usuários</a></li>
                    <li><a href="{{URL::to('admin/listar/empresas')}}">Empresas</a></li>
                    <li><a href="{{URL::to('admin/listar/categorias')}}">Categorias</a></li>
                    <li><a href="{{URL::to('admin/listar/regioes')}}">Regiões</a></li>
                </ul>
            </aside>
            <section class="main-section" style="min-height: 500px">
                <div class="row">
                    <div class="medium-12 columns"><!-- Inicio da area do conteudo -->
                        <h3>Lista de Empresas</h3>
                        @if ( isset($ok))
                        <div>
                            <strong>Dados alterados com sucesso!</strong>
                        </div>
                        @endif
                        @if ( isset($excluido))
                        <div>
                            <strong>Dados apagados com sucesso!</strong>
                        </div>
                        @endif
                        {{Form::open(array('method'=>'post', 'url'=>"admin/filtrar/empresa/"))}}
                        <div class="row">
                            <div class="medium-2 columns">
                                <input type="radio" name="tipo" value="1" id="id"><label for="id">ID</label><br />
                                <input type="radio" name="tipo" value="2" id="nome"><label for="nome">Nome da empresa</label>
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::text('valor','',array('id'=>'busca')) }}
                            </div>
                             <div class="medium-2 columns end">
                                {{ Form::button('Buscar', array('type'=>'submit', 'class'=>'button', 'title'=>'Buscar empresa')) }}
                            </div>
                            {{Form::close()}}
                        </div>
                        <table >
                            <thead>
                                <tr>
                                    <td><strong>Código</strong></td>
                                    <td><strong>Nome</strong></td>
                                    <td><strong>E-mail</strong></td>
                                    <td><strong>Responsável</strong></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dados as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
                                    <td>{{$d->nome_emp}}</td>
                                    <td>{{$d->email}}</td>
                                    <td>{{$d->nome_resp}}</td>
                                    <td>
                                        {{Form::open(array('method'=>'post', 'url'=>"admin/excluir/empresa/$d->id"))}}
                                        {{Form::hidden('_method', 'DELETE') }}
                                        <ul class="button-group round">
                                            <li><a href="{{URL::to("admin/editar/empresa/$d->id")}}" class="button secondary tiny" title="Editar dados"><i class="fi-pencil" style="font-size: 1rem"></i></a></li>
                                            <li><a href="{{URL::to("admin/empresa/imagens/$d->id")}}" class="button secondary tiny" title="Editar imagens"><i class="fi-photo" style="font-size: 1rem"></i></a></li>
                                            @if($d->tipo == 1)
                                            <li><a href="{{URL::to("admin/empresa/destaque/$d->id")}}" class="button warning tiny" title="Editar imagens"><i class="fi-star" style="font-size: 1rem"></i></a></li>
                                            @else
                                            <li><a href="{{URL::to("admin/empresa/destaque/$d->id")}}" class="button secondary tiny" title="Editar imagens"><i class="fi-star" style="font-size: 1rem"></i></a></li>
                                            @endif
                                            <li><button class="button alert tiny" title="Excluir registro" type="submit"><i class="fi-trash" style="font-size: 1rem"></i></button></li>
                                        </ul>
                                        {{Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$dados->links()}}
                    </div><!-- Fim area do conteudo -->
                </div>
            </section>

            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>
@stop