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

//Rotas com atutenticação de usuário
Route::get('/usuario/cadastro', 'UserController@createUsers');
Route::post('/usuario/cadastro', 'UserController@storeUsers');
Route::get('/empresa/cadastro', 'CompanyController@createCompanies');
Route::post('/empresa/cadastro', 'CompanyController@storeCompanies');
Route::get('/categoria/cadastro', 'CategoryController@createCategories');
Route::post('/categoria/cadastro', 'CategoryController@storeCategories');
Route::post('/subcategoria/cadastro', 'CategoryController@storeSubCategories');
