<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use App\Jornada;
use Illuminate\Http\Request;

class JornadaController extends Controller
{
    public function index()
    {
      $qniela = Jornada::all();
      //$qniela = Jornada::where('id', '>', '1')->get();

      //$qniela = DB::table('jornadas')->get();
      //dd($qniela);
      //return $qniela;
      return view('jornadas.jornadaIndex', compact('qniela'));
    }
}
