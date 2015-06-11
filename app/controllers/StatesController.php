<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StatesController
 *
 * @author alexandre
 */
class StatesController extends BaseController {

    public function createRegiao() {

        $estados = State::lists('nome', 'id');
        return View::make('admin.cadastros.f_cadastro_regiao', array(
                    'estados' => $estados
        ));
    }

    public function storeEstado() {
        $regras = array(
            'nome_estado' => 'required',
            'sigla' => 'required'
        );

        $mensagens = array(
            'nome_estado.required' => 'Nome inválido.',
            'sigla.required' => 'Sigla inválida.'
        );

        $validacao = Validator::make(Input::all(), $regras, $mensagens);

        if ($validacao->fails()) {
            return Redirect::to('admin/cadastro/regiao')->withErrors($validacao)->withInput(Input::all());
        } else {
            $estado = new State;

            $estado->nome = Input::get('nome_estado');
            $estado->sigla = Input::get('sigla');

            $estado->save();

            $estados = State::lists('nome', 'id');
            $ok = 1;
            return View::make('admin.cadastros.f_cadastro_regiao', array(
                        'ok' => $ok,
                        'estados' => $estados
            ));
        }
    }

    public function storeCidade() {
        $regras = array(
            'nome_cidade' => 'required'
        );

        $mensagens = array(
            'nome_cidade.required' => 'Nome inválido.'
        );

        $validacao = Validator::make(Input::all(), $regras, $mensagens);

        if ($validacao->fails()) {

            return Redirect::to('admin/cadastro/regiao')->withErrors($validacao)->withInput(Input::all());
        } else {
            $cidade = new City;

            $cidade->nome = Input::get('nome_cidade');
            $cidade->states_id = Input::get('estado');

            $cidade->save();

            $estados = State::lists('nome', 'id');
            $ok = 1;

            return View::make('admin.cadastros.f_cadastro_regiao', array(
                        'ok'=> $ok,
                        'estados'=> $estados
            ));
        }
    }

}
