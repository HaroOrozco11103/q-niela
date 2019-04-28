<?php

namespace App\Http\Controllers;

use App\Jornada;
use App\Equipo;
use App\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function __construct()
    {
      //$this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jornadas = Jornada::all();
        $partidos = Partido::all();
        $equipos = Equipo::all();

        return view('partidos.partidosIndex', compact('partidos', 'jornadas', 'equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jornadas = Jornada::all();
        $equipos = Equipo::all();
        return view('partidos.partidoForm', compact('jornadas', 'equipos'));
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
          'jornada_id' => 'required|integer',
          'equipo_local' => 'required|integer',//different:equipo_visitante
          'equipo_visitante' => 'required|integer',//different:equipo_local
          'resultado' => 'nullable',
        ]);

        $par = new Partido();
        $par->jornada_id = $request->jornada_id;
        $par->equipo_local = $request->equipo_local;
        $par->equipo_visitante = $request->equipo_visitante;
        $par->resultado = "0 - 0";

        $par->save();

        /*
         * Crea un nuevo documento en memoria asignando los valores de cada columna

        $partido = new Partido([
          'jornada_id' => $request->jornada_numero,
          'equipo_local' => $request->equipo_local,
          'equipo_visitante' => $request->equipo_visitante,
          'resultado' => "0 - 0",
        ]);
        $partido->save();
        */

        /*
        //Agrega tido lo recibido de $request mas el atributo string de resultado, asignandoles "0-0" como valor
        $request->merge([
          'resultado' => "0-0",
        ]);
        $partido = Partido::create($request);
        */

        return redirect()->route('partidos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {
        $jornadas = Jornada::all();
        $equipos = Equipo::all();
        return view('partidos.partidoShow', compact('partido', 'jornadas', 'equipos'));
    }

    /**
     * Muestra los partidos de X jornada
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function showJorn(Partido $partido, Jornada $jornada)
    {
        $jornadas = Jornada::all();
        $partidos = Partido::all();
        $equipos = Equipo::all();
        return view('partidos.partidosJornada', compact('partidos', 'jornadas', 'equipos', 'jornada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function edit(Partido $partido)
    {
        $jornadas = Jornada::all();
        $equipos = Equipo::all();
        return view('partidos.partidoForm', compact('partido', 'equipos', 'jornadas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        $partido->delete();
        return redirect()->route('partidos.index');
    }
}
