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
    return view('paginas.inicio');
});

Route::get('/inicio', function ()
{
    return view('paginas.inicio');
})->name('inicio');

//--------------------------------------------------------USERS--------------------------------------------------------
//Route::get('/usuarios', 'UserController@index')->name('users.index');//->middleware('auth');   //Vreificación de login (retorna a la pagina de log)
Route::resource('users', 'UserController');
Route::get('users/contrasena/{user}', 'UserController@editPass')
->name('users.editPass');
Route::PATCH('users/cambiar-contraseña/{user}', 'UserController@updatePass')
->name('users.updatePass');
Route::PATCH('users/inhabilitar/{user}', 'UserController@softDelete')
->name('users.softDelete');

//-------------------------------------------------------EQUIPOS-------------------------------------------------------
//Route::get('/equipo', 'EquipoController@index')->name('equipos.index');
Route::resource('equipos', 'EquipoController')->middleware('auth');

//-----------------------------------------------------PRONOSTICOS-----------------------------------------------------
//Route::get('/pronosticos', 'PronosticoController@index')->name('pronosticos.index');
Route::resource('pronosticos', 'PronosticoController');
Route::get('pronosticos/pronosticos-por-jornada/{jornada}', 'PronosticoController@showJorn')
    ->name('pronosticos.showJorn');
Route::get('pronosticos/create/{jornada?}', 'PronosticoController@createProJorX')
    ->name('pronosticos.createProJorX')->middleware('auth');

//-------------------------------------------------------PARTIDOS------------------------------------------------------
//Route::get('/resultados', 'PartidoController@index')->name('partidos.index');
Route::resource('partidos', 'partidoController')->middleware('auth');
Route::get('/partidos/partidos-por-jornada/{jornada}', 'PartidoController@showJorn')
    ->name('partidos.showJorn')->middleware('auth');
Route::get('/partidos/partidos-resultados/{jornada}', 'PartidoController@editRes')
    ->name('partidos.editRes')->middleware('auth');
Route::get('/partidos/create/{jornada?}', 'PartidoController@createParJorX')
    ->name('partidos.createParJorX')->middleware('auth');
//Route::match(['put', 'patch'], '/partidos/cambiar-resultados', 'PartidoController@updateRes')
    //->name('partidos.updateRes');
Route::PATCH('/partidos/cambiar-resultados/{partido}', 'PartidoController@updateRes')
    ->name('partidos.updateRes')->middleware('auth');

//------------------------------------------------------JORNADAS-------------------------------------------------------
//Route::get('/jornadas', 'JornadaController@index')->name('jornadas.index');
Route::resource('jornadas', 'JornadaController')->middleware('auth');

//------------------------------------------------------INFORMES-------------------------------------------------------
Route::resource('informes', 'InformeController');

//-------------------------------------------------------BIENVENIDA-------------------------------------------------------

Route::get('/bienvenida', 'PaginasController@bienvenida');

//-------------------------------------------------------PAGINAS-------------------------------------------------------
Route::get('/informacion', 'PaginasController@info');

Route::get('/contacto', 'PaginasController@contacto');


Route::get('/miembros', 'PaginasController@miembros')->name('miembros');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
