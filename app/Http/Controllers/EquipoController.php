<?php

namespace App\Http\Controllers;

use App\Jornada;
use App\Partido;
use App\User;
use App\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $equipos = Equipo::all();
      $equipos = $equipos->sortByDesc('puntos');
      if (\Auth::user()->tipo == "admin")
      {
        return view('equipos.equiposIndex', compact('equipos'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        $partidos = Partido::all();
        $jornadas = Jornada::all();
        return view('equipos.equipoIndex', compact('equipos', 'partidos', 'jornadas'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (\Auth::user()->tipo == "admin")
      {
        return view('equipos.equipoForm');
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('equipos.index');
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
      if (\Auth::user()->tipo == "admin")
      {
        $request->validate([
          'nombre' => 'required|string|min:3|max:255|unique:equipos',
          'gana' => 'integer|max:17',
          'pierde' => 'integer|max:17',
          'empata' => 'integer|max:17',
          'golFavor' => 'integer',
          'golContra' => 'integer',
          'difGoles' => 'integer',
          'puntos' => 'integer|max:51',
        ]);

        $eqp = new Equipo();
        $eqp->nombre = $request->input('nombre');
        $eqp->gana = 0;
        $eqp->pierde = 0;
        $eqp->empata = 0;
        $eqp->golFavor = 0;
        $eqp->golContra = 0;
        $eqp->difGoles = 0;
        $eqp->puntos = 0;

        $eqp->save();

        return redirect()->route('equipos.index')
          ->with([
              'mensaje' => 'El equipo ha sido creado exitosamente',
              'alert-class' => 'alert-warning'
          ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('equipos.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
      if (\Auth::user()->tipo == "admin")
      {
        return view('equipos.equipoShow', compact('equipo'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('equipos.index');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
      if (\Auth::user()->tipo == "admin")
      {
        return view('equipos.equipoForm', compact('equipo'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('equipos.index');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $equipoId = $equipo->id;
        $request->validate([
          'nombre' => 'required|string|min:3|max:255|unique:equipos,nombre,'.$equipoId,
          'gana' => 'integer|max:17',
          'pierde' => 'integer|max:17',
          'empata' => 'integer|max:17',
          'golFavor' => 'integer',
          'golContra' => 'integer',
          'difGoles' => 'integer',
          'puntos' => 'integer|max:51',
        ]);

        $equipo->nombre = $request->input('nombre');
        $equipo->gana = 0;
        $equipo->pierde = 0;
        $equipo->empata = 0;
        $equipo->golFavor = 0;
        $equipo->golContra = 0;
        $equipo->difGoles = 0;
        $equipo->puntos = 0;

        //$equipo->pierde = $request->pierde;
        //$equipo->empata = $request->empata;
        //$equipo->golFavor = $request->golFavor;
        //$equipo->golContra = $request->golContra;
        //$equipo->difGoles = $request->difGoles;
        //$equipo->puntos = $request->puntos;

        $equipo->save();
        return redirect()->route('equipos.show', $equipo->id)
          ->with([
              'mensaje' => 'El equipo ha sido modificado exitosamente',
              'alert-class' => 'alert-warning'
          ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('equipos.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $equipo->delete();
        return redirect()->route('equipos.index')
          ->with([
              'mensaje' => 'El equipo ha sido eliminado exitosamente',
              'alert-class' => 'alert-warning'
          ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return redirect()->route('equipos.index');
      }
    }
}
