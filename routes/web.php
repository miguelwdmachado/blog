<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@posts')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usertypes', 'UserTypesController@index')->name('usertypes');
Route::post('/editusertypes', 'UserTypesController@edit')->name('editusertypes');
Route::post('/updateusertypes', 'UserTypesController@update')->name('updateusertypes');
Route::post('/deleteusertypes', 'UserTypesController@destroy')->name('deleteusertypes');
Route::get('/insertusertypes', 'UserTypesController@insert')->name('insertusertypes');
Route::post('/storeusertypes', 'UserTypesController@store')->name('storeusertypes');

Route::get('/categoria', 'CategoriaController@index')->name('categoria');
Route::post('/editcategoria', 'CategoriaController@edit')->name('editcategoria');
Route::post('/updatecategoria', 'CategoriaController@update')->name('updatecategoria');
Route::post('/deletecategoria', 'CategoriaController@destroy')->name('deletecategoria');
Route::get('/insertcategoria', 'CategoriaController@insert')->name('insertcategoria');
Route::post('/storecategoria', 'CategoriaController@store')->name('storecategoria');

Route::get('/posts', 'PostagemController@index')->name('posts');
Route::get('/post', 'PostagemController@show')->name('post');
Route::post('/editpost', 'PostagemController@edit')->name('editpost');
Route::post('/updatepost', 'PostagemController@update')->name('updatepost');
Route::post('/deletepost', 'PostagemController@destroy')->name('deletepost');
Route::get('/insertpost', 'PostagemController@insert')->name('insertpost');
Route::get('/storepost', 'PostagemController@salvar')->name('storepost');
Route::post('/storepost', 'PostagemController@salvar')->name('storepost');
Route::get('/postcategoria', 'PostagemController@busca_categoria')->name('postcategoria');
Route::get('/posttexto', 'PostagemController@busca_texto')->name('posttexto');
Route::get('/postautor', 'PostagemController@busca_autor')->name('postautor');

Route::get('/users', 'UsersController@index')->name('users');
Route::post('/edituser', 'UsersController@edit')->name('edituser');
Route::post('/updateuser', 'UsersController@update')->name('updateuser');
