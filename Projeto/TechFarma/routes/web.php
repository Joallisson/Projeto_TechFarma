<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('teste/', function () {
    return view('teste');
});

Route::get('/', function () {
    return view('welcome');
});






Route::middleware(['admin'])->group(function () {

    Route::prefix('admin/')->group(function () { //GRUPO DE ROTAS ADMIN

        //IR PARA PÁGINA DE LOGIN DO ADMIN ==========================================================
        Route::get('login', 'AdminController@telaLogin')->name('login');

        //IR PARA PÁGINA DE CADASTRO DO ADMIN ==========================================================
        Route::get('cadastrar', 'AdminController@fazerCadastro')->name('cadastrar');

        //FAZENDO O LOGIN DO ADMIN ==================================================================
        Route::post('fazendoLogin', 'AdminController@fazendoLogin')->name('fazendoLogin');

        //IR PARA TELA INICIAL DO ADMIN =============================================================
        Route::get('index', 'AdminController@index')->name('index');

        //IR PARA TELA INICIAL DO ADMIN =============================================================
        Route::get('logout', 'AdminController@logout')->name('logout');
    });





});











//IR PARA PÁGINA DE CADASTRO ============================================================
Route::post('/admin/cadastrar', 'AdminController@fazerCadastro')->name('admin.cadastrar');







Route::post('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/home', 'HomeController@index')->name('home');
