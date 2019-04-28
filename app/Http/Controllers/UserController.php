<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
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
      $users = User::all();
      $equipos = Equipo::all();
      //$usr = user::where('id', '>', '1')->get();

      //$usr = DB::table('users')->get();
      //dd($usr);
      //return $usr;
      return view('users.usersIndex', compact('users', 'equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('auth.register');
        $equipos = Equipo::all();
        return view('users.userForm', compact('equipos'));
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
          'nombre' => 'required|string|max:255',
          'username' => 'required|string|min:5|max:25|unique:users',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|max:30|confirmed',
          'equipo_id' => 'nullable',
        ]);

        $usr = new User(); 	//crea un objeto dependencia
        $usr->nombre = $request->input('nombre');
        $usr->email = $request->input('email');
        $usr->username = $request->input('username');
        $usr->password = Hash::make('$request->password');
        $usr->tipo = "comun";
        //$usr->created_at = \Carbon\Carbon::now()->toDateTimeString()
        //$usr->updated_at = \Carbon\Carbon::now()->toDateTimeString()

        $usr->save();		//guarda la información en la db

        return  redirect()->route('users.index');		//salir y moverse a index por seguridad (en caso de ser usuario comun y no admin)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $equipos = Equipo::all();
        return view('users.userShow', compact('user', 'equipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $equipos = Equipo::all();
        return view('users.userForm', compact('user', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
      {
        $request->validate([
          'nombre' => 'required|string|max:255',
          'username' => 'required|string|min:5|max:25',
          'email' => 'required|string|email|max:255',
          'password' => 'required|string|min:8|max:30|confirmed',
          'equipo_id' => 'nullable',
        ]);

        $user->nombre = $request->input('nombre');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make('$request->password');
        $user->equipo_id = $request->equipo_id;
        $user->tipo = $request->input('tipo');
        $user->save();
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
