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
      if(\Auth::user()->tipo == "admin")
      {
        $jornadas = Jornada::all();
        $partidos = Partido::all();
        $equipos = Equipo::all();

        return view('partidos.partidosIndex', compact('partidos', 'jornadas', 'equipos'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        //return redirect()->route('partidos.index');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function create(Jornada $jornada)
    {
      if(\Auth::user()->tipo == "admin")
      {
        $jornadas = Jornada::all();
        $equipos = Equipo::all();
        return view('partidos.partidoForm', compact('jornadas', 'equipos',  'jornada'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function createParJorX(Jornada $jornada)
    {
      if(\Auth::user()->tipo == "admin")
      {
        $jornadas = Jornada::all();
        $equipos = Equipo::all();
        return view('partidos.partidoForm', compact('jornadas', 'equipos', 'jornada'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
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
          'jornada_id' => 'required|integer',
          'equipo_local' => 'required|integer',//|different:equipo_visitante'
          'equipo_visitante' => 'required|integer|different:equipo_local',
          'resL' => 'nullable|integer',
          'resV' => 'nullable|integer',
        ]);

        $par = new Partido();
        $par->jornada_id = $request->jornada_id;
        $par->equipo_local = $request->equipo_local;
        $par->equipo_visitante = $request->equipo_visitante;

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
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function show(Partido $partido)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $jornadas = Jornada::all();
        $equipos = Equipo::all();
        return view('partidos.partidoShow', compact('partido', 'jornadas', 'equipos'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
    }

    /**
     * Muestra los partidos de X jornada
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function showJorn(Jornada $jornada)
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
    public function edit(Partido $partido, Jornada $jornada)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $jornadas = Jornada::all();
        $equipos = Equipo::all();
        return view('partidos.partidoForm', compact('partido', 'equipos', 'jornadas', 'jornada'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
    }

    /**
     * Muestra los partidos de X jornada
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function editRes(Jornada $jornada)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $jornadas = Jornada::all();
        $partidos = Partido::all();
        $equipos = Equipo::all();
        return view('partidos.partidoValoresForm', compact('partidos', 'jornadas', 'equipos', 'jornada'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
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
      if (\Auth::user()->tipo == "admin")
      {
        $request->validate([
          'jornada_id' => 'required|integer',
          'equipo_local' => 'required|integer',//different:equipo_visitante
          'equipo_visitante' => 'required|integer|different:equipo_local',
          'resL' => 'nullable|integer',
          'resV' => 'nullable|integer',
        ]);

        $partido->jornada_id = $request->jornada_id;
        $partido->equipo_local = $request->equipo_local;
        $partido->equipo_visitante = $request->equipo_visitante;
        $partido->resL = null;
        $partido->resV = null;
        //$partido->resL = $request->resL;
        //$partido->resV = $request->resV;
        $partido->save();

        return redirect()->route('partidos.show', $partido->id);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partido  $partido
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function updateRes(Request $request, Partido $partido, Jornada $jornada)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $request->validate([
          'resL' => 'nullable|integer',
          'resV' => 'nullable|integer',
        ]);

        $partido->resL = $request->resL;
        $partido->resV = $request->resV;
        $partido->save();

        return redirect()->route('partidos.editRes', $partido->jornada_id);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $partido->delete();
        return redirect()->route('partidos.index');
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('partidos.index');
      }
    }
}
