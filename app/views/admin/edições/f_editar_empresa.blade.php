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
                    <div class="medium-12 columns">
                        {{Form::open(array('method'=>'post', 'url'=>"admin/editar/empresa/$dados->id"))}}
                        <h3>Dados da empresa</h3>
                        <hr />
                        @if ( count($errors) > 0)
                        <div>
                            <strong>Erro(s) encontrado(s):</strong>
                            <ul>
                                @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (isset($ok))
                        <div>
                            <strong>Registro atualizado com sucesso!</strong>
                        </div>
                        @endif
                        <div class="row">
                            <div class="medium-6 columns">
                                {{ Form::label('razao', 'Razão Social') }}
                                {{ Form::text('razao',$dados->razao_social,array('id'=>'razao')) }}
                            </div>
                            <div class="medium-6 columns">
                                {{ Form::label('nome_emp', 'Nome Fantasia') }}
                                {{ Form::text('nome_emp',$dados->nome_emp,array('id'=>'nome_emp')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-6 columns">
                                {{ Form::label('cpfcnpj','CPF/CNPJ*') }} <small><i>(Apenas números)</i></small>
                                {{ Form::text('cpfcnpj',$dados->cpfcnpj,array('id'=>'cpfcnpj')) }}
                            </div>
                            <div class="medium-6 columns">
                                {{ Form::label('ie','Inscrição Estadual') }} <small><i>(Apenas números)</i></small>
                                {{ Form::text('ie',$dados->ie,array('id'=>'ie')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-6 columns">
                                {{ Form::label('nome_res', 'Nome do Responsável*') }}
                                {{ Form::text('nome_res',$dados->nome_resp,array('id'=>'nome_res')) }}
                            </div>
                            <div class="medium-6 columns">
                                {{ Form::label('email_emp', 'E-mail de Contato*') }}
                                {{ Form::text('email_emp',$dados->email,array('id'=>'email_emp')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-12 columns">
                                {{ Form::label('descricao', 'Resumo*') }}
                                {{ Form::textarea('descricao', $dados->descricao, array('rows'=>'5', 'id'=>'descricao')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('tel1', 'Telefone Contato 1*') }}
                                {{ Form::text('tel1',$dados->telefone1,array('id'=>'tel1', 'maxlength'=>'11')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('tel2', 'Telefone Contato 2') }}
                                {{ Form::text('tel2',$dados->telefone2,array('id'=>'tel2', 'maxlength'=>'11')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('tel3', 'Telefone Contato 3') }}
                                {{ Form::text('tel3',$dados->celular,array('id'=>'cel', 'maxlength'=>'11')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                <div class="form-group">
                                    {{ Form::label('cep', 'CEP*') }}
                                    {{ Form::text('cep',$dados->cep,array('id'=>'cep', 'maxlength'=>'8')) }}
                                </div>
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('uf', 'Estado*') }}
                                {{ Form::select('uf', $estados, $dados->estado) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('cidade', 'Cidade*') }}
                                {{ Form::select('cidade', $cidades, $dados->cidade) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('bairro', 'Bairro*') }}
                                {{ Form::text('bairro',$dados->bairro,array( 'id'=>'bairro')) }}
                            </div>
                            <div class="medium-8 columns">
                                {{ Form::label('endereco', 'Endereço*') }}
                                {{ Form::text('endereco',$dados->endereco,array( 'id'=>'endereco')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-2 columns">
                                {{ Form::label('numero', 'Número*') }}
                                {{ Form::text('numero',$dados->numero,array('id'=>'numero')) }}
                            </div>
                            <div class="medium-8 columns">
                                {{ Form::label('complemento', 'Complemento') }}
                                {{ Form::text('complemento',$dados->complemento,array('id'=>'complemento')) }}
                            </div>
                            <div class="medium-2 columns">
                                {{ Form::label('coord', 'Coordenadas Geogáficas') }}
                                {{ Form::text('coord',$dados->coordenadas,array('id'=>'coord')) }}
                            </div>
                        </div>
                        <hr />
                        <h3>Dados complementares</h3>
                        <hr />
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('categoria', 'Categoria Principal*') }}
                                {{ Form::select('categoria', $categorias, $dados->categories_id, array('id'=>'cat')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('sub1', 'Sub-Categoria 1*') }}
                                {{ Form::select('sub1', array('0'=>'Selecione a categoria'), $dados->sub1_id, array('id'=>'sub1')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('sub2', 'Sub-Categoria 2') }}
                                {{ Form::select('sub2', array('0'=>'Selecione a categoria'), '', array('id'=>'sub2')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                @if($dados->tipo == 1)
                                {{ Form::checkbox('destaque', 1, true) }} {{ Form::label('destaque', 'Plano destaque') }}
                                @else
                                {{ Form::checkbox('destaque', 1) }} {{ Form::label('destaque', 'Plano destaque') }}
                                @endif
                            </div>
                        </div>
                        <hr />
                        <h3>Rede sociais </h3>
                        <hr />
                        @if($result)
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('site', 'Site') }}
                                {{ Form::text('site','',array('id'=>'site')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('face', 'Facebook') }}
                                {{ Form::text('face','',array('id'=>'face')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('google', 'Google+') }}
                                {{ Form::text('google','',array('id'=>'google')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('twitter', 'Twitter') }}
                                {{ Form::text('twitter','',array('id'=>'twitter')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('istagram', 'Istagram') }}
                                {{ Form::text('istagram','',array('id'=>'isntagram')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('youtube', 'YouTube') }}
                                {{ Form::text('youtube','',array('id'=>'youtube')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('linkedin', 'Linkedin') }}
                                {{ Form::text('linkedin','',array('id'=>'linkedin')) }}
                            </div>
                        </div>
                        @else
                        @foreach($redes as $r)
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('site', 'Site') }}
                                {{ Form::text('site',$r->site_url,array('id'=>'site')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('face', 'Facebook') }}
                                {{ Form::text('face',$r->link_fb,array('id'=>'face')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('google', 'Google+') }}
                                {{ Form::text('google',$r->link_gp,array('id'=>'google')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('twitter', 'Twitter') }}
                                {{ Form::text('twitter',$r->link_tw,array('id'=>'twitter')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="medium-4 columns">
                                {{ Form::label('istagram', 'Istagram') }}
                                {{ Form::text('istagram',$r->link_is,array('id'=>'isntagram')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('youtube', 'YouTube') }}
                                {{ Form::text('youtube',$r->link_yt,array('id'=>'youtube')) }}
                            </div>
                            <div class="medium-4 columns">
                                {{ Form::label('linkedin', 'Linkedin') }}
                                {{ Form::text('linkedin',$r->link_li,array('id'=>'linkedin')) }}
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <p><small><i>OBS1: Os campos marcados com * são obrigatórios.</i></small></p>
                        <p><small><i>OBS2: Antes de <strong>Salvar</strong> verificar se os campos <strong>Estado, Cidade, Categoria e SubCategoria</strong> foram selecionados.</i></small></p>
                        {{ Form::button('Salvar', array('type'=>'submit', 'class'=>'button', 'title'=>'Salvar alterações')) }}
                        {{Form::close()}}
                    </div>
            </section>
            <a class="exit-off-canvas"></a>
        </div>
    </div>
</div>

@stop