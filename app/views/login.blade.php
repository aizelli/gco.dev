@extends('templates.default')
@section('conteudo')

<div class="row">
    <div class="medium-2 columns">
        <img src="{{ URL::to('/')}}/img/logo2.png"/>
    </div>
</div>
<div class="row">
    <div class="medium-6 columns medium-centered">
        <div class="panel radius">
            {{ Form::open(array('method'=>'post', 'url'=>'/login', 'class'  => 'well')) }}
            <h2 class="text-center text-muted text">Login</h2>
            <div class="form-group">
                {{ Form::text('email', '', array('autofocus', 'placeholder' => 'E-mail')) }}
            </div>
            <div class="form-group">
                {{ Form::password('senha', array( 'placeholder' => 'Senha')) }}
            </div>
            @if (Session::has('flash_error'))
            <div class="alert alert-danger">E-mail ou senha inválidos.</div>
            @endif
            <div>
                {{ Form::button('Entrar', array('type'=>'submit', 'class'=>'button small radius')) }} 
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop