<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function info()
    {
        return view('paginas/informacion');
    }

    public function contacto($value='')
    {
      return view('paginas.contacto');
    }

    public function bienvenida($nombre, $apellido = null)
    {
      return view('paginas.bienvenida', compact('nombre', 'apellido'))
      ->with([
        'nombre_completo' => $nombre . ' ' . $apellido
      ]);
    }

    public function miembros()
    {
      return view('paginas/miembros');
    }
}
