<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('usuario.index', compact('users'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'username' => 'required|unique:users|min:3|max:20',
            'direccion' => 'required|min:5|max:80',
            'telefono' => 'required|min:7|max:15',
            'rol' => 'required',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);
        User::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'name' => $request->name,
            'username' => $request->username,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'email' => $request->email,
            'password' => Hash::make($request->password)

            
        ]);

        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('categoria.show', compact('categoria'));
    }

    public function edit($user)
    {
        $user = User::find($user); 
        return view('usuario.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'username' => 'required|min:3|max:20',
            'direccion' => 'required|min:5|max:80',
            'telefono' => 'required|min:7|max:15',
            'rol' => 'required',
            'email' => 'required|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);
        
        $registro = User::find($user->id);
  
        $registro->name = $request->name;
        $registro->username = $request->username;
        $registro->direccion = $request->direccion;
        $registro->telefono = $request->telefono;
        $registro-> rol= $request->rol;
        $registro->email = $request->email;
        $registro->password = Hash::make($request->password);
        

        $registro->save();
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        
        $user->delete();
        
        return redirect()->route('usuario.index');
    }
}
