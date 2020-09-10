<?php

use Illuminate\Support\Facades\Route;
use App\Libro;

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

Route::get('/', 'UserController@start');

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('publica3', 'UserController@saludo'); //Misma funcion que arriba pero la logica esta en el controlador UserController

Route::get('base', 'UserController@inicio')->name('base'); //Si se quiere enlazar a un boton debe ponerse ->name() para poder enrutarlo

Route::get('base/{id}', 'UserController@detalle')->name('usuarios/detalle');

Route::post('base', 'UserController@crear')->name('usuarios.crear');

Route::get('editar/{id}', 'UserController@editar')->name('usuarios.editar');

Route::put('editar/{id}', 'UserController@update')->name('usuarios.update');

Route::delete('eliminar/{id}', 'UserController@eliminar')->name('usuarios.eliminar');

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function() {

    Route::get('formulario', function() {
        return view('formulario');
    })->name('formulario');

    Route::get('autos', 'UserController@mostrar')->name('autos');

    Route::post('autos', 'UserController@cargarautos')->name('autos.cargar');

    Route::get('autos/{id}', 'UserController@editarautos')->name('autos.editar');

    Route::put('autos/{id}', 'UserController@updateautos')->name('autos.update');

    Route::delete('elimacion/{id}', 'UserController@deleteautos')->name('autos.eliminar');
});

Route::get('autosglobal', 'UserController@post');

Route::resource('autosupload', 'AutoController');

Route::get('inicio', 'UserController@start')->name('inicio.pagina');