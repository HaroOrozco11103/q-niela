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
      $equipos = Equipo::all();
      if(\Auth::user()->tipo == "admin")
      {
        $users = User::all();
        //$usr = user::where('id', '>', '1')->get();

        //$usr = DB::table('users')->get();
        //dd($usr);
        //return $usr;
        return view('users.usersIndex', compact('users', 'equipos'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        $user = \Auth::user();
        //session(['user' => \Auth::user()->id ]);
        return view('users.userIndex', compact('user', 'equipos'));
      }
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
        //return view('auth.register');
        $equipos = Equipo::all();
        return view('users.userForm', compact('equipos'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('users.index');
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
      if (\Auth::user()->tipo == "admin")
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
        $usr->password = Hash::make($request->password);
        $usr->tipo = "comun";
        //$usr->created_at = \Carbon\Carbon::now()->toDateTimeString()
        //$usr->updated_at = \Carbon\Carbon::now()->toDateTimeString()

        $usr->save();		//guarda la información en la db

        return  redirect()->route('users.index');		//salir y moverse a index por seguridad (en caso de ser usuario comun y no admin)
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('users.index');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $equipos = Equipo::all();
        return view('users.userShow', compact('user', 'equipos'));
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('users.index');
      }
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editPass(User $user)
    {
        return view('users.cambiarPasswordForm', compact('user'));
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
          //'password' => 'required|string|min:8|max:30|confirmed',
          'equipo_id' => 'nullable',
        ]);

        $user->nombre = $request->input('nombre');
        $user->username = $request->input('username');
        //$user->password = Hash::make('$request->password');
        $user->equipo_id = $request->equipo_id;
        if (\Auth::user()->tipo == "admin")
        {
          $user->tipo = $request->input('tipo');
          $user->email = $request->input('email');
          $user->save();
          return redirect()->route('users.show', $user->id);
        }
        elseif(\Auth::user()->tipo == "comun")
        {
          $user->save();
          return redirect()->route('users.index');
          //session(['user' => \Auth::user()->id ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePass(Request $request, User $user)
      {
        $request->validate([
          'password' => 'required|string|min:8|max:30|confirmed',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();
        if (\Auth::user()->tipo == "admin")
        {
          return redirect()->route('users.update', $user->id);
        }
        elseif(\Auth::user()->tipo == "comun")
        {
          return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      if (\Auth::user()->tipo == "admin")
      {
        $user->delete();
        return redirect()->route('users.index');
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('users.index');
      }
    }
}
