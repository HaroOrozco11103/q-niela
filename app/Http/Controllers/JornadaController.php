<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JornadaController extends Controller
{
    public function index()
    {
      $qniela = DB::table('jornadas')->get();
      //dd($qniela);
      //return $qniela;
      return view('jornadas.jornadaIndex', compact('qniela'));
    }
}
