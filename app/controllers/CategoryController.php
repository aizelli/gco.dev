<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryController
 *
 * @author alexandre
 */
class CategoryController extends BaseController {

    public function createCategories() {

        $categorias = Category::where('parent_id', '=', null)->lists('name', 'id');

        return View::make('admin.cadastros.f_cadastro_categoria', array(
                    'categorias' => $categorias
        ));
    }

    public function storeCategories() {

        $regras = array(
            'nome' => 'required'
        );

        $mensagens = array(
            'nome.required' => '<strong>Categoria</strong> inválida.'
        );

        $validacao = Validator::make(Input::all(), $regras, $mensagens);

        if ($validacao->fails()) {

            return Redirect::to('admin/cadastro/categoria')->withErrors($validacao);
        } else {

            $categoria = new Category;

            $categoria->create(array('name' => Input::get('nome')));

            $categorias = Category::where('parent_id', '=', null)->lists('name', 'id');

            return View::make('admin.cadastros.f_cadastro_categoria', array(
                        'ok' => true,
                        'categorias' => $categorias
            ));
        }
    }

    public function storeSubCategories() {

        $regras = array(
            'subcategoria' => 'required'
        );

        $mensagens = array(
            'subcategoria.required' => '<strong>Subcategoria</strong> inválida.'
        );

        $validacao = Validator::make(Input::all(), $regras, $mensagens);

        if ($validacao->fails()) {

            return Redirect::to('admin/cadastro/categoria')->withErrors($validacao);
        } else {

            //$child1 = $root->children()->create(['name' => 'Child 1']);

            $categoria = new Category;

            $categoria->id = Input::get('categoria');

            $categoria->children()->create(array('name' => Input::get('subcategoria')));

            $categorias = Category::where('parent_id', '=', null)->lists('name', 'id');

            return View::make('admin.cadastros.f_cadastro_categoria', array(
                        'ok' => true,
                        'categorias' => $categorias
            ));
        }
    }

}
