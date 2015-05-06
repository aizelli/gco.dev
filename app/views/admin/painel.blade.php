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

                </div><!-- Fim area do conteudo -->
            </div>
        </div>
    </div>
</div>
@stop