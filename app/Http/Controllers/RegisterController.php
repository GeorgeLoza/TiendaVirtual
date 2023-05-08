<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    } //end index
    public function store(Request $request)
    {

        //modify request
        $request->request->add(['username' => Str::lower($request->username)]);
        //validation
        $this->validate($request, [
            'name' => 'required|max:50',
            'username' => 'required|unique:users|min:3|max:20',
            'direccion' => 'required|min:5|max:80',
            'telefono' => 'required|min:7|max:15',
            'rol' => 'required',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        //create a user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'rol' => $request->rol,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        // Autenticar usuario
        //    auth()->attempt([
        //        'email' => $request->email,
        //        'password' => $request->password
        //    ]);
        auth()->attempt($request->only('email','password'));
        //Redireccionar
        return redirect()->route('index');
    }

    public function edit($user)
    {
        $user = User::find($user); 
        return view('usuario.perfil', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'username' => 'required|min:3|max:20',
            'direccion' => 'required|min:5|max:80',
            'telefono' => 'required|min:7|max:15',
            'email' => 'required|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);
        
        $registro = User::find($user->id);
  
        $registro->name = $request->name;
        $registro->username = $request->username;
        $registro->direccion = $request->direccion;
        $registro->telefono = $request->telefono;
        $registro->email = $request->email;
        $registro->password = Hash::make($request->password);
        

        $registro->save();
        return redirect()->route('/');
    }

}
