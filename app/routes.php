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

//Rotas com atutenticação de usuário
Route::group(array('before' => 'auth'), function() {
    Route::get('/painel/admin', 'UserController@createPainel');
    Route::get('/sair', 'UserController@fazLogout');
    Route::get('/cadastro/usuario', 'UserController@createUsers');
    Route::post('/cadastro/usuario', 'UserController@storeUsers');
    Route::get('/cadastro/empresa', 'CompanyController@createCompanies');
    Route::post('/cadastro/empresa', 'CompanyController@storeCompanies');
    Route::get('/cadastro/categoria', 'CategoryController@createCategories');
    Route::post('/cadastro/categoria', 'CategoryController@storeCategories');
    Route::post('/cadastro/subcategoria', 'CategoryController@storeSubCategories');
    Route::get('/cadastro/regiao', 'StatesController@createRegiao');
    Route::post('/cadastro/estado', 'StatesController@storeEstado');
    Route::post('/cadastro/cidade', 'StatesController@storeCidade');
});
