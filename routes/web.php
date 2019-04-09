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

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/inicio', function ()
{
    return view('inicio');
});

Route::get('/perfil', 'PerfilController@index')->name('perfilindex')->middleware('auth');   //Vreificación de login (retorna a la pagina de log)

//Route::get('/equipo', 'EquipoController@index')->name('equipoindex');

//Route::get('/pronosticos', 'PronosticosController@index')->name('pronosticosindex');

//Route::get('/resultados', 'ResultadosController@index')->name('resultadosindex');

Route::get('/jornadas', 'JornadaController@index')->name('jornadas.index');

Route::get('/informacion', 'PaginasController@info');

Route::get('/contacto', 'PaginasController@contacto');

Route::get('/bienvenida/{nombre}/{apellido?}', 'PaginasController@bienvenida');

Route::get('/miembros', 'PaginasController@miembros')->name('miembros');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
