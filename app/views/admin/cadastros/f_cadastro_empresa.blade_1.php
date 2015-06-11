@extends('templates.default')
@section('conteudo')

<div class="row">
    <div id="corpo">
        <div id="conteudo" class="col-md-offset-1 col-sm-offset-1 col-lg-offset-1 col-md-10 col-sm-10 col-lg-10"><!-- Inicio da area do conteudo -->
            {{Form::open(array('method'=>'post', 'url'=>'admin/cadastro/empresa', 'files'=>true))}}
            <h3>Dados da empresa</h3>
            <hr />
            @if ( count($errors) > 0)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Erro(s) encontrado(s):</strong>
                <ul>
                    @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (isset($ok))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Registro salvo com sucesso!</strong>
            </div>
            @endif
            <p class="small"><i>OBS: Os campos marcados com * são obrigatórios.</i></p>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        {{ Form::label('razao', 'Razão Social*') }}
                        {{ Form::text('razao','',array('class'=>'form-control', 'id'=>'razao')) }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        {{ Form::label('nome_emp', 'Nome Fantasia') }}
                        {{ Form::text('nome_emp','',array('class'=>'form-control', 'id'=>'nome_emp')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        {{ Form::label('cnpj','CNPJ*') }} <small><i>(Apenas números)</i></small>
                        {{ Form::text('cnpj','',array('class'=>'form-control', 'id'=>'cnpj')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6">
                        {{ Form::label('ie','Inscrição Estadual') }} <small><i>(Apenas números)</i></small>
                        {{ Form::text('ie','',array('class'=>'form-control', 'id'=>'ie')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        {{ Form::label('nome_res', 'Nome do Responsável*') }}
                        {{ Form::text('nome_res','',array('class'=>'form-control', 'id'=>'nome_res')) }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        {{ Form::label('email_emp', 'E-mail de Contato*') }}
                        {{ Form::text('email_emp','',array('class'=>'form-control', 'id'=>'email_emp')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        {{ Form::label('site', 'Web Site') }}
                        {{ Form::text('site','',array('class'=>'form-control', 'id'=>'site')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        {{ Form::label('descricao', 'Resumo*') }}
                        {{ Form::textarea('descricao', null, array('rows'=>'5', 'class'=>'form-control', 'id'=>'descricao')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('tel1', 'Telefone Contato 1*') }}
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-sm-4">
                                {{ Form::text('ddd_tel1','',array('class'=>'form-control', 'id'=>'tel1', 'maxlength'=>'2', 'placeholder'=>'DDD')) }}
                            </div>
                            <div class="col-xs-8 col-md-8 col-sm-8">
                                {{ Form::text('tel1','',array('class'=>'form-control', 'id'=>'tel1', 'maxlength'=>'8', 'placeholder'=>'Ex: "12341234"')) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('tel2', 'Telefone Contato 2') }}
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-sm-4">
                                {{ Form::text('ddd_tel2','',array('class'=>'form-control', 'id'=>'tel2', 'maxlength'=>'2', 'placeholder'=>'DDD')) }}
                            </div>
                            <div class="col-xs-8 col-md-8 col-sm-8">
                                {{ Form::text('tel2','',array('class'=>'form-control', 'id'=>'tel2', 'maxlength'=>'8', 'placeholder'=>'Ex: "12341234"')) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('cel', 'Telefone Celular') }}
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-sm-4">
                                {{ Form::text('ddd_cel','',array('class'=>'form-control', 'id'=>'cel', 'maxlength'=>'2', 'placeholder'=>'DDD')) }}
                            </div>
                            <div class="col-xs-8 col-md-8 col-sm-8">
                                {{ Form::text('cel','',array('class'=>'form-control', 'id'=>'cel', 'maxlength'=>'9', 'placeholder'=>'Ex: "912341234"')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('cep', 'CEP*') }}
                        {{ Form::text('cep1','',array('class'=>'form-control', 'id'=>'cep', 'maxlength'=>'8', 'placeholder'=>'00000')) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('uf', 'Estado*') }}
                        {{ Form::select('uf', $estados, 26, array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('cidade', 'Cidade*') }}
                        {{ Form::select('cidade', array('0'=>'Selecione'), '', array('class'=>'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('bairro', 'Bairro*') }}
                        {{ Form::text('bairro','',array('class'=>'form-control', 'id'=>'bairro')) }}
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        {{ Form::label('endereco', 'Endereço*') }}
                        {{ Form::text('endereco','',array('class'=>'form-control', 'id'=>'endereco')) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        {{ Form::label('numero', 'Número*') }}
                        {{ Form::text('numero','',array('class'=>'form-control', 'id'=>'numero')) }}
                    </div>
                    <div class="col-xs-10 col-md-10 col-sm-10">
                        {{ Form::label('complemento', 'Complemento') }}
                        {{ Form::text('complemento','',array('class'=>'form-control', 'id'=>'complemento')) }}
                    </div>
                </div>
            </div>
            <hr />
            <h3>Informações do Contrato <button class="btn btn-default" type="button"><span class="caret"></span></button></h3>
            <hr />
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('tipo_con', 'Tipo de Contrato*') }}
                        {{ Form::select('tipo_con', array(
                                        '0'=>'selecione'
                                        ), '0', array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('dias_con', 'Prazo do contrato (dias)*') }}
                        {{ Form::select('dias_con', array(
                                        '0'=>'selecione'
                                        ), '0', array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('valor_con', 'Valor do contrato (dias)*') }}
                        {{ Form::text('valor_con','',array('class'=>'form-control', 'id'=>'valor')) }}
                    </div>
                </div>
            </div>
            <hr />
            <h3>Redes Sociais <button class="btn btn-default" type="button"><span class="caret"></span></button></h3>
            <hr />
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('face', 'Facebook') }}
                        {{ Form::text('face','',array('class'=>'form-control', 'id'=>'face')) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('google', 'Google+') }}
                        {{ Form::text('google','',array('class'=>'form-control', 'id'=>'google')) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('twitter', 'Twitter') }}
                        {{ Form::text('twitter','',array('class'=>'form-control', 'id'=>'twitter')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('isntagran', 'Instagran') }}
                        {{ Form::text('isntagran','',array('class'=>'form-control', 'id'=>'isntagran')) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('needid', 'Needid') }}
                        {{ Form::text('needid','',array('class'=>'form-control', 'id'=>'needid')) }}
                    </div>
                </div>
            </div>
            <hr />
            <h3>Informações Adicionais <button class="btn btn-default" type="button"><span class="caret"></span></button></h3>
            <hr />
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        {{ Form::label('categoria', 'Categoria*') }}
                        <select name="categoria" class="form-control">
                            <option value="0" selected="selected">Selecione</option>
                            @foreach($categorias as $c)
                            <optgroup label="{{ucwords($c->name)}}">
                                @foreach($c->getDescendants() as $descendant) 
                                <option value="{{$descendant->id}}">
                                    {{ucwords($descendant->name)}}
                                </option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <br />
            {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'btn btn-default', 'title'=>'Cadastrar Usuário')) }}
            <br /><br />
            {{Form::close()}}
        </div><!-- Fim area do conteudo -->
    </div>
</div>
@stop