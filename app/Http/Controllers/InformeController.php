<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informe;

class InformeController extends Controller
{
    public function index()
    {
      return view('paginas/informe');
    }
    
    public function store(Request $request)
    {
      $request->validate([
        'inputName' => 'nullable',
        'inputEmail' => 'nullable',
        'inputUsername' => 'nullable',
        'formInforme' => 'required|string|min:3|max:255',
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
}
