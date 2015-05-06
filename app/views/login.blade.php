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
                @include('includes.menu')
            </div>
        </div>
        <div class="row">
            <div id="corpo">
                <div id="conteudo" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6">
                    {{ Form::open(array('method'=>'post', 'url'=>'/login', 'class'  => 'well')) }}
                    <h2 class="text-center text-muted text">Login</h2>
                    <div class="form-group">
                        {{ Form::text('email', '', array('class' => 'form-control', 'autofocus', 'placeholder' => 'E-mail')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('senha', array('class' => 'form-control', 'placeholder' => 'Senha')) }}
                    </div>
                    @if (Session::has('flash_error'))
                    <div class="alert alert-danger">E-mail ou senha inválidos.</div>
                    @endif
                    <div>
                        {{ Form::button('Entrar', array('class' => 'btn btn-info', 'type'=>'submit')) }} 
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop