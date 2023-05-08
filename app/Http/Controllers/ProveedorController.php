<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedor.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:50',
            'direccion' => 'required|min:5|max:50',
            'celular' => 'required|min:7|max:15',
            'correo' => 'required|max:50',
            

        ]);
        Proveedor::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'correo'=>$request->correo
            
            
        ]);

        return redirect()->route('proveedor.index');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedor.show', compact('proveedor'));
    }

    public function edit($proveedor)
    {
        $proveedor = Proveedor::find($proveedor); 
        return view('proveedor.edit', ['proveedor' => $proveedor]);
    }

    public function update(Request $request, Proveedor $proveedor)
    {

        $this->validate($request, [
            'nombre' => 'required|max:50',
            'direccion' => 'required|min:5|max:50',
            'celular' => 'required|min:7|max:15',
            'correo' => 'required|max:50',
        ]);
        
        $registro = Proveedor::find($proveedor->id);
        $registro->nombre = $request->nombre;
        $registro->direccion = $request->direccion;
        $registro->celular = $request->celular;
        $registro->correo = $request->correo;
        

        $registro->save();
        return redirect()->route('proveedor.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        
        $proveedor->delete();
        
        return redirect()->route('proveedor.index');
    }
}
