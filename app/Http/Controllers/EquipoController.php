<?php

namespace App\Http\Controllers;

use App\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
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
      $equipos = Equipo::all();

      return view('equipos.equiposIndex', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.equipoForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect()->route('equipos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        return view('equipos.equipoShow', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.equipoForm', compact('equipo'));
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
        return redirect()->route('equipos.show', $equipo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index');
    }
}
