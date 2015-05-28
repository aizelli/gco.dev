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
            <div id="corpo">
                <div id="conteudo" class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-sm-10 col-lg-10"><!-- Inicio da area do conteudo -->
                    <h3 class="text text-muted">Lista de Usuários</h3>
                    @if ( isset($ok))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Dados alterados com sucesso!</strong>
                        
                    </div>
                    @endif
                    @if ( isset($excluido))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Dados apagados com sucesso!</strong>
                        
                    </div>
                    @endif
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <td><strong>Código</strong></td>
                                <td><strong>Nome</strong></td>
                                <td><strong>E-mail</strong></td>
                                <td><strong>Usuário</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dados as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->nome}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->usuario}}</td>
                                <td>
                                    {{Form::open(array('method'=>'post', 'url'=>"admin/excluir/usuario/$d->id"))}}
                                    {{Form::hidden('_method', 'DELETE') }}
                                    <a href="{{URL::to("admin/editar/usuario/$d->id")}}" class="btn btn-primary">Editar</a>
                                    {{Form::button('Excluir', array('type'=>'submit', 'class'=>'btn btn-danger', 'title'=>'Excluir')) }}
                                    {{Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$dados->links()}}
                </div><!-- Fim area do conteudo -->
            </div>
        </div>
    </div>
</div>
@stop