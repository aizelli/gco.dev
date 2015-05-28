<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

//Rotas publicas
Route::get('/', 'HomeController@home');
Route::get('/empresa/detalhes/{id}', 'CompanyController@showCompany');
Route::get('/login', 'UserController@createLogin');
Route::post('/login', 'UserController@fazLogin');
Route::get('/pesquisa', 'CompanyController@pesquisaRegiao');
Route::get('dropdown_cidades/{id}', 'HomeController@dropdownCities');

//Rotas com atutenticação de usuário
Route::group(array('before' => 'auth'), function() {
    Route::get('/painel/admin', 'UserController@createPainel');
    Route::get('/sair', 'UserController@fazLogout');
    Route::get('admin/cadastro/usuario', 'UserController@createUsers');
    Route::post('admin/cadastro/usuario', 'UserController@storeUsers');
    Route::get('admin/listar/usuarios', 'UserController@showUsers');
    Route::get('admin/editar/usuario/{id}', 'UserController@editUser');
    Route::post('admin/editar/usuario/{id}', 'UserController@updateUser');
    Route::delete('admin/excluir/usuario/{id}', 'UserController@deleteUser');
    Route::get('admin/cadastro/empresa', 'CompanyController@createCompanies');
    Route::post('admin/cadastro/empresa', 'CompanyController@storeCompanies');
    Route::post('admin/cadastro/empresa/dados_adicionais/{id}', 'CompanyController@storeCompInfo');
    Route::get('admin/editar/empresa/{id}', 'CompanyController@editCompanies');
    Route::post('admin/cadastro/empresa/{id}', 'CompanyController@updateCompanies');
    Route::get('admin/cadastro/categoria', 'CategoryController@createCategories');
    Route::post('admin/cadastro/categoria', 'CategoryController@storeCategories');
    Route::post('admin/cadastro/subcategoria', 'CategoryController@storeSubCategories');
    Route::get('admin/cadastro/regiao', 'StatesController@createRegiao');
    Route::post('admin/cadastro/estado', 'StatesController@storeEstado');
    Route::post('admin/cadastro/cidade', 'StatesController@storeCidade');
});
