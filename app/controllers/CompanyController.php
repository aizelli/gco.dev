<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompanyController
 *
 * @author alexandre
 */
class CompanyController extends BaseController {

    public function createCompanies() {

        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();
        $estados = State::lists('nome', 'id');
        array_unshift($estados, "Selecione");

        return View::make('admin.cadastros.f_cadastro_empresa', array(
                    'categorias' => $categorias,
                    'estados' => $estados
        ));
    }

    public function storeCompanies() {

        $regras = array(
            'razao' => 'required'
        );

        $mensagens = array(
            'razao.required' => '<strong>Razão Social</strong> inválida.'
        );

        $validação = Validator::make(Input::all(), $regras, $mensagens);

        if ($validação->fails()) {

            return Redirect::to('admin/cadastro/empresa')->withErrors($validação)->withInput(Input::all());
        } else {

            $empresa = new Company;

            $empresa->razao_social = Input::get('razao');
            $empresa->nome_emp = Input::get('nome_emp');
            $empresa->cnpj = Input::get('cnpj');
            $empresa->ie = Input::get('ie');
            $empresa->nome_resp = Input::get('nome_res');
            $empresa->email = Input::get('email_emp');
            $empresa->site_url = Input::get('site');
            $empresa->descricao = Input::get('descricao');
            $empresa->telefone1 = Input::get('ddd_tel1') . Input::get('tel1');
            $empresa->telefone2 = Input::get('ddd_tel2') . Input::get('tel2');
            $empresa->celular = Input::get('ddd_cel') . Input::get('cel');
            $empresa->cep = Input::get('cep1') . Input::get('cep2');
            $empresa->pais = 'BRA';
            $empresa->estado = Input::get('uf');
            $empresa->cidade = Input::get('cidade');
            $empresa->bairro = Input::get('bairro');
            $empresa->endereco = Input::get('endereco');
            $empresa->numero = Input::get('numero');
            $empresa->complemento = Input::get('complemento');
            $empresa->tipo_contrato = Input::get('tipo_con');
            $empresa->dias_contrato = Input::get('dias_con');
            $empresa->valor_contrato = Input::get('valor_con');
            $empresa->ativo = 1;
            $empresa->categories_id = Input::get('categoria');
            $empresa->save();


            return View::make('admin.cadastros.f_cadastro_emp_ia', array(
                        'id' => $empresa->id
            ));
        }
    }

    public function storeCompInfo($id) {

        $empresa = Company::find($id);

        $empresa->fb_url = Input::get('face');
        $empresa->gp_url = Input::get('google');
        $empresa->tw_url = Input::get('twitter');
        $empresa->in_url = Input::get('isntagran');
        $empresa->ne_url = Input::get('needid');
        
        $empresa->save();
        
        $destino = public_path()."/img/empresas/$empresa->razao_social";
        
        if(Input::hasFile('arte')){
            $nome = "arte_".$empresa->razao_social.".".Input::file('arte')->getClientOriginalExtension();
            $arte = Input::file('arte');
            $arte->move($destino, $nome);
        }
        if(Input::hasFile('img1')){
            $nome = "img1_".$empresa->razao_social.".".Input::file('img1')->getClientOriginalExtension();
            $arte = Input::file('img1');
            $arte->move($destino, $nome);
        }
        if(Input::hasFile('img2')){
            $nome = "img2_".$empresa->razao_social.".".Input::file('img2')->getClientOriginalExtension();
            $arte = Input::file('img2');
            $arte->move($destino, $nome);
        }
        if(Input::hasFile('img3')){
            $nome = "img3_".$empresa->razao_social.".".Input::file('img3')->getClientOriginalExtension();
            $arte = Input::file('img3');
            $arte->move($destino, $nome);
        }
        if(Input::hasFile('img4')){
            $nome = "img4_".$empresa->razao_social.".".Input::file('img4')->getClientOriginalExtension();
            $arte = Input::file('img4');
            $arte->move($destino, $nome);
        }
        if(Input::hasFile('img5')){
            $nome = "img5_".$empresa->razao_social.".".Input::file('img5')->getClientOriginalExtension();
            $arte = Input::file('img5');
            $arte->move($destino, $nome);
        }
    }

    public function showCompany($id) {

        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();
        $estados = State::lists('nome', 'id');
        $cidades = City::lists('nome', 'id');
        $empresa = Company::find($id);

        return View::make('visualiza_empresa', array(
                    'estados' => $estados,
                    'categorias' => $categorias,
                    'estados' => $estados,
                    'cidades' => $cidades
        ));
    }

    public function pesquisaRegiao() {

        $valores = [$pesquisa = Input::get('pesquisa'), $estado = Input::get('uf'), $cidade = Input::get('cidade')];

        return $valores;
    }

}
