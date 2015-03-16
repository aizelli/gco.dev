<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author alexandre
 */
class UserController extends BaseController{
    
    public function createUsers(){
        
        return View::make('admin.f_cadastro_usuario');
    }
    
    public function storeUsers(){
        
        $regras = array(
            'nome'=>'required|min:3',
            'senha'=>'required',
            're-senha'=>'required_with:senha|same:senha',
            'nivel' => 'required'
        );
        
        $mensagens = array(
            'nome.required' => '<strong>Nome</strong> invalido.',
            'senha.required' => '<strong>Senha</strong> invalida.',
            're-senha.required_with' => '<strong>Confirmar Senha</strong> invalida.',
            'nome.min' => '<strong>Nome</strong> invalido.',
            're-senha.same' => 'As <strong>Senhas</strong> não conferem'
        );
        
        $validacao = Validator::make(Input::all(), $regras, $mensagens);
        
        if($validacao->fails()){
            return Redirect::to('/usuario/cadastro')->withErrors($validacao)->withInput(Input::except('senha', 're-senha'));
        }else{
            
            $usuario = new User();
            
            $usuario->nome = Input::get('nome');
            $usuario->password = Hash::make(Input::get('senha'));
            $usuario->email = Input::get('email');
            $usuario->usuario = Input::get('usuario');
            $usuario->nivel = Input::get('nivel');
            $usuario->ativo = 1;
            
            $usuario->save();
            
            return Redirect::to('/usuario/lista');
        }
    }
}
