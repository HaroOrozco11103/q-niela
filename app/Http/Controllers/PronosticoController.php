<?php

namespace App\Http\Controllers;

use App\Jornada;
use App\User;
use App\Partido;
use App\Equipo;
use App\Pronostico;
use Illuminate\Http\Request;

class PronosticoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'showJorn');
        $this->middleware('admin')->except('index', 'show', 'showJorn');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jornadas = Jornada::all();
        return view('pronosticos.pronosticosIndex', compact('jornadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProJorX(Jornada $jornada)
    {
        $jornadas = Jornada::all();
        $users = User::all();
        $partidos = Partido::all();
        $equipos = Equipo::all();
        return view('pronosticos.pronosticoForm', compact('jornadas', 'jornada', 'users', 'partidos', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'apodo' => 'required|string|max:25',
          'user_id' => 'nullable|integer',
          'jornada_id' => 'required|integer',
        ]);

        $request->merge([
            'totalAciertos' => 0,
        ]);

        //dd($request->prediccions);
        $pronostico = Pronostico::create($request->except('partidos_id', 'prediccions'));

        $partidos_id = $request->partidos_id; //Pasamos el valor a una variable
        //Dado que recibimos un array, debemos recorrer el array de los partidos y predicciones
        foreach($partidos_id as $key => $partidoId)
        {
            //$key tendrá valores 0, 1, 2, ... según el número de partidos
            $pronostico->partidos()->attach($partidoId,  ['prediccion' => $request->prediccions[$key]]);
        }
     		//Aquí estbas recibiendo $request->partidos_id pero attach espera un entero, y tu le pasas un arreglo, por eso fallaba
        //$pronostico->partidos()->attach($request->partidos_id,  ['prediccion' => $request->prediccions]);
        //$pronostico->partidos()->save($request->partidos_id, ['prediccion' => $request->prediccions]);

        return redirect()->route('pronosticos.index')
           ->with([
                'mensaje' => 'Pronóstico añadido',
                'alert-class' => 'alert-warning'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function show(Pronostico $pronostico)
    {
      $jornadas = Jornada::all();
      $pronosticos = Pronostico::all();
      $equipos = Equipo::all();
      $partidos = Partido::all();
      $users = User::all();
      return view('pronosticos.pronosticoShow', compact('jornadas', 'pronostico', 'pronosticos', 'equipos', 'partidos', 'users'));
    }

    /**
     * Muestra los pronosticos de X jornada
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function showJorn(Jornada $jornada)
    {
      $jornadas = Jornada::all();
      $pronosticos = Pronostico::all();
      $equipos = Equipo::all();
      $partidos = Partido::all();
      $users = User::all();
      return view('pronosticos.pronosticosJornada', compact('jornadas', 'jornada', 'pronosticos', 'equipos', 'partidos', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Pronostico $pronostico, Jornada $jornada)
    {
      $jornadas = Jornada::all();
      $users = User::all();
      $partidos = Partido::all();
      $equipos = Equipo::all();
      return view('pronosticos.pronosticoForm', compact('jornadas', 'jornada', 'users', 'partidos', 'equipos', 'pronostico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pronostico $pronostico)
    {
        $pronostico->update($request->except('partidos_id', 'prediccions'));
        //Sincroniza los partidos relacionados con el pronostico
        $pronostico->partidos()->sync($request->partidos_id);

        return redirect()->route('pronosticos.index')
        ->with([
             'mensaje' => 'El pronóstico ha sido modificado exitosamente',
             'alert-class' => 'alert-warning'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pronostico $pronostico)
    {
        //Elimina la relación entre documento y funcionarios.
        $pronostico->partidos()->detach();
        $pronostico->delete();
        return redirect()->route('pronosticos.index')
          ->with([
              'mensaje' => 'El pronóstico ha sido eliminado',
              'alert-class' => 'alert-warning',
          ]);
    }
}
