<?php

namespace App\Http\Controllers;

use App\Partido;
use App\Jornada;
use Illuminate\Http\Request;

class JornadaController extends Controller
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
      $jornadas = Jornada::all();
      //$jor = Jornada::where('id', '>', '1')->get();

      //$jor = DB::table('jornadas')->get();
      //dd($jor);
      //return $jor;
      return view('jornadas.jornadasIndex', compact('jornadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(\Auth::user()->tipo == "admin")
      {
        return view('jornadas.JornadaForm');
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('jornadas.index');
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
          'numero' => 'required|integer|max:17|unique:jornadas',
        ]);
        //dd('Entra a metodo store');		//dd para hacer pruebas y revisar qué está pasando
        //dd($request->all());
        $jor = new Jornada(); 	//crea un objeto dependencia

        $jor->numero = $request->numero;

        $jor->inicio = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('inicio'))->toDateString();
        $jor->fin = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('fin'))->toDateString();

        $jor->save();		//guarda la información en la db

        return  redirect()->route('jornadas.index')		//salir y moverse a index por seguridad (en caso de ser usuario comun y no admin)
          ->with([
              'mensaje' => 'La jornada ha sido creada exitosamente',
              'alert-class' => 'alert-warning'
          ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('jornadas.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function show(Jornada $jornada)
    {
      if (\Auth::user()->tipo == "admin")
      {
        return view('jornadas.jornadaShow', compact('jornada'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('jornadas.index');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function edit(Jornada $jornada)
    {
      if (\Auth::user()->tipo == "admin")
      {
        return view('jornadas.jornadaForm', compact('jornada'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('jornadas.index');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jornada $jornada)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $jornadaId = $jornada->id;
        $request->validate([
          'numero' => 'required|integer|max:25|unique:jornadas,numero,'.$jornadaId,
          'inicio' => 'required',
          'fin' => 'required'
        ]);

        $jornada->numero = $request->numero;
        $jornada->inicio = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('inicio'))->toDateString();
        $jornada->fin = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('fin'))->toDateString();
        $jornada->save();
        return redirect()->route('jornadas.show', $jornada->id)
          ->with([
              'mensaje' => 'La jornada ha sido modificada exitosamente',
              'alert-class' => 'alert-warning'
          ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('jornadas.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornada $jornada)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $jornada->delete();
        return redirect()->route('jornadas.index')
          ->with([
              'mensaje' => 'La jornada ha sido eliminada exitosamente',
              'alert-class' => 'alert-warning'
          ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('jornadas.index');
      }
    }
}
