<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('prueba', function() {
    return 'Hola mundo';
});

Route::get('user/{name?}', function($name = null) {
    return 'El nombre es: ' . $name;
})->where('name', '[A-Za-z]+');

Route::get('user/{id?}', function($id = null) {
    return 'El id es: ' . $id;
})->where('id', '[0-9]+');

Route::get('user/{nombre}/{apellido}/{edad}', function($nombre, $apellido, $edad) {
    return 'El usuario es: ' . $nombre . " " . $apellido . " y tiene " . $edad . " años";
})->where(['nombre' => '[A-Za-z]+', 'apellido' => '[A-Za-z]+', 'edad' => '[0-9]+']);

Route::get('usuario/{nombre}/{apellido}/{edad}', 'UserController@mostrartemplate'); //Misma funcion que arriba pero logica en UserController y restricciones de caracteres en RouteServiceProvider

Route::get('section/{tema}', function($tema) {
    return 'El tema de la noticia es ' . $tema;
})->where(['tema' => '[A-za-z]+']);

Route::get('usuario/{id}', function($id) {
    return 'El id ingresado es: ' . $id;
});

Route::get('publico/{id?}', 'UserController@show'); //Se utiliza un controlador para las condiciones

Route::get('publica', function() {
    return view('users', ['name' => 'Jose']);
});

Route::get('publica2', function() {
    return view('users')->with('name', 'Ignacion');
});

Route::get('publica3', 'UserController@saludo'); //Misma funcion que arriba pero la logica esta en el controlador UserController

Route::get('base', 'UserController@inicio')->name('base'); //Si se quiere enlazar a un boton debe ponerse ->name() para poder enrutarlo

Route::get('base/{id}', 'UserController@detalle')->name('usuarios/detalle');

Route::post('base', 'UserController@crear')->name('usuarios.crear');

Route::get('editar/{id}', 'UserController@editar')->name('usuarios.editar');

Route::put('editar/{id}', 'UserController@update')->name('usuarios.update');

Route::delete('eliminar/{id}', 'UserController@eliminar')->name('usuarios.eliminar');

Route::resource('notas', 'AutoController');

Route::group(['middleware' => 'auth'], function() {

    Route::get('formulario', function() {
        return view('formulario');
    })->name('formulario');

    Route::get('autos', 'UserController@mostrar')->name('autos');

    Route::post('autos', 'UserController@cargarautos')->name('autos.cargar');

    Route::get('autos/{id}', 'UserController@editarautos')->name('autos.editar');

    Route::put('autos/{id}', 'UserController@updateautos')->name('autos.update');

    Route::delete('elimacion/{id}', 'UserController@deleteautos')->name('autos.eliminar');
});

Route::get('publicaciones', 'UserController@post')->name('publicaciones');