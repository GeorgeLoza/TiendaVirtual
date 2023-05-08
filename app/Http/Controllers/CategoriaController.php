<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:255',

        ]);
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            
            
        ]);

        return redirect()->route('categoria.index');
    }

    public function show(Categoria $categoria)
    {
        return view('categoria.show', compact('categoria'));
    }

    public function edit($categoria)
    {
        $categoria = Categoria::find($categoria); 
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    public function update(Request $request, Categoria $categoria)
    {

        $this->validate($request, [
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:255',
        ]);
        
        $registro = Categoria::find($categoria->id);
  
        $registro->descripcion = $request->descripcion;
        $registro->nombre = $request->nombre;
        

        $registro->save();
        return redirect()->route('categoria.index');
    }

    public function destroy(Categoria $categoria)
    {
        
        $categoria->delete();
        
        return redirect()->route('categoria.index');
    }
}
