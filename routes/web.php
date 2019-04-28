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
    return view('inicio');
});

Route::get('/inicio', function ()
{
    return view('inicio');
});

//--------------------------------------------------------USERS--------------------------------------------------------
//Route::get('/usuarios', 'UserController@index')->name('users.index');//->middleware('auth');   //Vreificación de login (retorna a la pagina de log)
Route::resource('users', 'UserController');

//-------------------------------------------------------EQUIPOS-------------------------------------------------------
//Route::get('/equipo', 'EquipoController@index')->name('equipos.index');
Route::resource('equipos', 'EquipoController');
//-----------------------------------------------------PRONOSTICOS-----------------------------------------------------
Route::get('/pronosticos', 'PronosticoController@index')->name('pronosticos.index');

//-------------------------------------------------------PARTIDOS------------------------------------------------------
//Route::get('/resultados', 'PartidoController@index')->name('partidos.index');
Route::resource('partidos', 'partidoController');
Route::get('/partidos/partidos-por-jornada/{jornada}', 'PartidoController@showJorn')
    ->name('partidos.showJorn');
Route::get('/partidos/partidos-resultados/{jornada}', 'PartidoController@editRes')
    ->name('partidos.editRes');

//------------------------------------------------------JORNADAS-------------------------------------------------------
//Route::get('/jornadas', 'JornadaController@index')->name('jornadas.index');
Route::resource('jornadas', 'JornadaController');

//-------------------------------------------------------PAGINAS-------------------------------------------------------
Route::get('/informacion', 'PaginasController@info');

Route::get('/contacto', 'PaginasController@contacto');

Route::get('/bienvenida/{nombre}/{apellido?}', 'PaginasController@bienvenida');

Route::get('/miembros', 'PaginasController@miembros')->name('miembros');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
