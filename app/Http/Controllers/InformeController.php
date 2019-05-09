<?php

namespace App\Http\Controllers;

use App\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->only('destroy');
      $this->middleware('admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $informes = Informe::paginate(10);
      return view('informes.informesIndex', compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('informes.informeForm');
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
        'inputName' => 'required|string|max:255',
        'inputEmail' => 'nullable|string|email|max:255',
        'inputUsername' => 'nullable|string|min:5|max:25',
        'formInforme' => 'required|string|min:5|max:999',
      ]);

        $inf = new Informe();
        $inf->nombre = $request->input('inputName');
        $inf->email = $request->input('inputEmail');
        $inf->username = $request->input('inputUsername');
        $inf->informe = $request->input('formInforme');

        $inf->save();

        return redirect()->route('inicio')
          ->with([
              'mensaje' => 'El informe ha sido enviado con exito.',
              'alert-class' => 'alert-warning'
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {
      $informe->delete();
      return redirect()->route('informes.index')
        ->with([
            'mensaje' => 'El informe ha sido eliminado exitosamente',
            'alert-class' => 'alert-warning'
        ]);
    }
}
