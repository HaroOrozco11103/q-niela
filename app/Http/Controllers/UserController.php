<?php

namespace App\Http\Controllers;

//
//use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth')->except('index');
  }

  public function index()
  {
    $usr = Jornada::all();
    //$usr = Jornada::where('id', '>', '1')->get();

    //$usr = DB::table('jornadas')->get();
    //dd($usr);
    //return $usr;
    return view('users.usersIndex');
  }

  public function create()
  {
      return view('users.userForm');
  }
}
