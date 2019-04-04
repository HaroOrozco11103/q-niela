<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use App\Pronosticos;
use Illuminate\Http\Request;

class PronosticosController extends Controller
{
    public function index()
    {
      $qniela = Pronoticos::all();
      //$qniela = Jornada::where('id', '>', '1')->get();

      //$qniela = DB::table('jornadas')->get();
      //dd($qniela);
      //return $qniela;
      return view('pronosticosindex', compact('qniela'));
    }
}
