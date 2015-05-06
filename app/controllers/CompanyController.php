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

        return View::make('admin.f_cadastro_empresa')->with('categorias', $categorias);
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

            return Redirect::to('/cadastro/empresa')->withErrors($validação)->withInput(Input::all());
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
            $empresa->estado = Input::get('estado');
            $empresa->cidade = Input::get('cidade');
            $empresa->bairro = Input::get('bairro');
            $empresa->endereco = Input::get('endereco');
            $empresa->numero = Input::get('numero');
            $empresa->complemento = Input::get('complemento');
            $empresa->tipo_contrato = Input::get('tipo_con');
            $empresa->dias_contrato = Input::get('dias_con');
            $empresa->valor_contrato = Input::get('valor_con');
            $empresa->fb_url = Input::get('face');
            $empresa->gp_url = Input::get('google');
            $empresa->tw_url = Input::get('twitter');
            $empresa->in_url = Input::get('isntagran');
            $empresa->ne_url = Input::get('needid');
            $empresa->ativo = 1;
            $empresa->categories_id = Input::get('categoria'); 
            $empresa->save();
            
            $diretorio = public_path().'/img/empresa/'.$empresa->id; 
            File::makeDirectory($diretorio, 0777, true);
            $nome = 'img_cartao';
            $img = Input::file('img_cartao');
            $img->move($diretorio, $nome.'.'.$img->getClientOriginalExtension());
            
            $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();
            $ok = 1;

            return View::make('admin.f_cadastro_empresa')->with('categorias', $categorias)->with('ok', $ok);
        }
    }

    public function showCompany($id) {

        $categorias = Category::where('parent_id', '=', null)->orderBy('name')->get();
        $empresa = Company::find($id);

        return View::make('visualiza_empresa')->with('empresa', $empresa)->with('categorias', $categorias);
    }

}
