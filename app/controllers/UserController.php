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
class UserController extends BaseController {

    public function createUsers() {

        return View::make('admin.cadastros.f_cadastro_usuario');
    }

    public function storeUsers() {

        $regras = array(
            'nome' => 'required|min:3',
            'senha' => 'required',
            're-senha' => 'required_with:senha|same:senha',
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

        if ($validacao->fails()) {
            return Redirect::to('admin/cadastro/usuario')->withErrors($validacao)->withInput(Input::except('senha', 're-senha'));
        } else {

            $usuario = new User();

            $usuario->nome = Input::get('nome');
            $usuario->password = Hash::make(Input::get('senha'));
            $usuario->email = Input::get('email');
            $usuario->usuario = Input::get('usuario');
            $usuario->nivel = Input::get('nivel');
            $usuario->ativo = 1;

            $usuario->save();

            return Redirect::to('/painel/admin');
        }
    }

    public function showUsers() {

        $dados = User::paginate(10);

        return View::make('admin.listas.lista_usuarios', array(
                    'dados' => $dados
        ));
    }

    public function editUser($id) {

        $dados = User::find($id);

        return View::make('admin.edições.f_editar_usuario', array(
                    'dados' => $dados
        ));
    }

    public function updateUser($id) {
        $regras = array(
            'nome' => 'required|min:3',
            're-senha' => 'same:senha',
            'nivel' => 'required'
        );

        $mensagens = array(
            'nome.required' => '<strong>Nome</strong> invalido.',
            'nome.min' => '<strong>Nome</strong> invalido.',
            're-senha.same' => 'As <strong>Senhas</strong> não conferem'
        );

        $validacao = Validator::make(Input::all(), $regras, $mensagens);

        if ($validacao->fails()) {
            return Redirect::to("admin/editar/usuario/$id")->withErrors($validacao)->withInput(Input::except('senha', 're-senha'));
        } else {

            $usuario = User::find($id);

            $usuario->nome = Input::get('nome');
            $usuario->email = Input::get('email');
            $usuario->usuario = Input::get('usuario');
            $usuario->nivel = Input::get('nivel');
            $usuario->ativo = 1;
            if (Input::get('senha') != null) {
                $usuario->password = Hash::make(Input::get('senha'));
            }
            $usuario->save();

            $dados = User::paginate(10);

            return View::make('admin.listas.lista_usuarios', array(
                        'dados' => $dados,
                        'ok' => true
            ));
        }
    }

    public function deleteUser($id) {

        $usuario = User::find($id);

        $usuario->delete();

        $dados = User::paginate(10);

        return View::make('admin.listas.lista_usuarios', array(
                    'dados' => $dados,
                    'excluido' => true
        ));
    }

    public function createPainel() {
        return View::make('admin.painel');
    }

    public function createLogin() {

        return View::make('login');
    }

    public function fazLogin() {

        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('senha')))) {

            return Redirect::to('/painel/admin');
        } else {

            return Redirect::to('/login')
                            ->with('flash_error', 1)
                            ->withInput(Input::except('senha'));
        }
    }

    //Inicio do logout
    public function fazLogout() {
        Auth::logout();

        return Redirect::to('/');
    }

}
