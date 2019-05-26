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
      $this->middleware('auth');
      $this->middleware('admin')->only('create', 'store', 'show', 'softDelete', 'destroy');
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
        //$users = User::all();
        $users = User::paginate(10);
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

        return  redirect()->route('users.index')		//salir y moverse a index por seguridad (en caso de ser usuario comun y no admin)
          ->with([
              'mensaje' => 'El usuario ha sido creado exitosamente',
              'alert-class' => 'alert-warning'
          ]);
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
        //Aplica UserPolicy@update
        if(\Auth::user()->tipo == "comun" && \Auth::user()->cannot('update', $user))
        {
          return redirect()->route('users.edit', \Auth::user()->id);
        }

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
        $userId = $user->id;
        $request->validate([
          'nombre' => 'required|string|max:255',
          'username' => 'required|string|min:5|max:25|unique:users,username,'.$userId,
          'email' => 'required|string|email|max:255|unique:users,email,'.$userId,
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
          return redirect()->route('users.show', $user->id)
            ->with([
                'mensaje' => 'El usuario ha sido modificado exitosamente',
                'alert-class' => 'alert-warning'
            ]);
        }
        elseif(\Auth::user()->tipo == "comun")
        {
          //Aplica UserPolicy@update
          if(\Auth::user()->cannot('update', $user))
          {
            return redirect()->route('users.edit', \Auth::user()->id);
          }

          $user->save();
          return redirect()->route('users.index')
            ->with([
                'mensaje' => 'Tu información ha sido actualizada exitosamente',
                'alert-class' => 'alert-warning'
            ]);
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
        if(\Auth::user()->tipo == "admin")
        {
          $request->validate([
            'password' => 'required|string|min:8|max:30|confirmed',
          ]);
        }
        elseif(\Auth::user()->tipo == "comun")
        {
          $request->validate([
            'password' => 'required|string|min:8|max:30|confirmed',
            'oldPassword' => 'required|string|max:30',
          ]);
        }

        if (\Auth::user()->tipo == "admin")
        {
          $user->password = Hash::make($request->password);
          $user->save();
          return redirect()->route('users.update', $user->id)
            ->with([
                'mensaje' => 'La contraseña del usuario ha sido modificada exitosamente',
                'alert-class' => 'alert-warning'
            ]);
        }
        elseif(\Auth::user()->tipo == "comun")
        {
          if(Hash::check($request->oldPassword, $user->password))
          {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('users.index')
              ->with([
                  'mensaje' => 'Tu contraseña ha sido actualizada exitosamente',
                  'alert-class' => 'alert-warning'
              ]);
          }
          else
          {
              return redirect()->route('users.editPass', $user->id)
                ->with([
                    'mensaje' => 'Tu contraseña antigua no ha coincidido con el campo proporcionado',
                    'alert-class' => 'alert-warning'
                ]);
          }
        }
    }

    /**
     * Soft delete
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function softDelete(User $user)
    {
      $user->deleted_at = \Carbon\Carbon::now()->toDateTimeString();
      $user->save();
      return redirect()->route('users.index')
        ->with([
          'mensaje' => 'El usuario ha sido inhabilitado',
          'alert-class' => 'alert-warning'
        ]);
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
        return redirect()->route('users.index')
          ->with([
              'mensaje' => 'El usuario ha sido eliminado exitosamente',
              'alert-class' => 'alert-warning'
          ]);
      }
      elseif(\Auth::user()->tipo == "comun")
      {
        return  redirect()->route('users.index');
      }
    }
}
