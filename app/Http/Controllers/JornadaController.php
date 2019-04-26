<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use App\Jornada;
use Illuminate\Http\Request;

class JornadaController extends Controller
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
        return view('jornadas.JornadaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('Entra a metodo store');		//dd para hacer pruebas y revisar qué está pasando
        //dd($request->all());
        $jor = new Jornada(); 	//crea un objeto dependencia
        //$jor->jornada = $request->input('numero');

        $jor->numero = $request->numero;

        $jor->inicio = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('inicio'))->toDateString();
        $jor->fin = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('fin'))->toDateString();

        $jor->save();		//guarda la información en la db

        return  redirect()->route('jornadas.index');		//salir y moverse a index por seguridad (en caso de ser usuario comun y no admin)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function show(Jornada $jornada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function edit(Jornada $jornada)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornada $jornada)
    {
        //
    }
}
