<?php

namespace App\Http\Controllers;

use App\Jornada;
use App\User;
use App\Partido;
use App\Pronostico;
use Illuminate\Http\Request;

class PronosticoController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->tipo == "admin")
        {
          $jornadas = Jornada::all();

          return view('pronosticos.pronosticosIndex', compact('jornadas'));
        }
        elseif(\Auth::user()->tipo == "comun")
        {
          //return redirect()->route('partidos.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Jornada $jornada)
    {
        if(\Auth::user()->tipo == "admin")
        {
          $jornadas = Jornada::all();
          $users = User::all();
          $partidos = Partido::all();
          return view('pronosticos.pronosticoForm', compact('jornadas', 'jornada', 'users', 'partidos'));
        }
        elseif(\Auth::user()->tipo == "comun")
        {
          return redirect()->route('pronosticos.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(\Auth::user()->tipo == "admin")
      {
          $request->validate([
            'apodo' => 'required|string|max:25',
            'user_id' => 'nullable|integer',
            'jornada_id' => 'required|integer',
          ]);

          //Agrega el total de aciertos al request
          $request->merge([
              'totalAciertos' => 0
          ]);

          /*
         * Guarda $request en pronosticos, excepto 'partidos_id' y predicciones
         * que no es parte de la tabla 'pronosticos' pero la enviamos en el formulario
         * para realizar la relación muchos a muchos entre Pronostico y Partido.
         * Una vez creado el Pronostico, lo asigna a $pro
         */
          $pronostico = Pronostico::create($request->except('partidos_id', 'predicciones'));

         /*
         * Crea la relación entre el pronostico y los partidos
         * Desde la instancia de $pronostico, se llama al métod partidos (del Modelo Pronostico)
         * para crear la realción con el método attach() que recibe uno o muchos IDs de los partidos.
         */
          $pronostico->partidos()->attach($request->partido_id, $request->predicciones);

          return redirect()->route('pronosticos.index')
            ->with([
                'mensaje' => 'Pronóstico añadido',
                'alert-class' => 'alert-warning'
            ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('pronosticos.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function show(Pronostico $pronostico)
    {
        //
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
      return view('pronosticos.pronosticosJornada', compact('jornadas', 'jornada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Pronostico $pronostico)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pronostico $pronostico)
    {
        //
    }
}
