<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.create', compact('categorias','proveedores'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required|max:255',
            'modelo' => 'required',
            'talla' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'imagen' => 'required',
            'categoria_id' => 'required',
            'proveedor_id' => 'required'

        ]);
        producto::create([
            'descripcion' => $request->descripcion,
            'modelo' => $request->modelo,
            'talla' => $request->talla,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'imagen' => $request->imagen,
            'categoria_id' => $request->categoria_id,
            'proveedor_id' => $request->proveedor_id
            
        ]);

        return redirect()->route('producto.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit($producto)
    {
        $producto = Producto::find($producto); 
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.edit', ['producto' => $producto,'categorias' => $categorias,'proveedores' => $proveedores]);
    }

    public function update(Request $request, Producto $producto)
    {

        $this->validate($request, [
            'descripcion' => 'required|max:255',
            'modelo' => 'required',
            'talla' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'imagen' => 'required',
            'categoria_id' => 'required',
            'proveedor_id' => 'required'

        ]);
        
        $registro = Producto::find($producto->id);
  
        $registro->descripcion = $request->descripcion;
        $registro->modelo = $request->modelo;
        $registro->talla = $request->talla;
        $registro->cantidad = $request->cantidad;
        $registro->precio = $request->precio;
        $registro->imagen = $request->imagen;
        $registro->categoria_id = $request->categoria_id;
        $registro->proveedor_id = $request->proveedor_id;

        $registro->save();
        return redirect()->route('producto.index');
    }

    public function destroy(Producto $producto)
    {
        
        $producto->delete();
        //elimnar la imagen
        $imagen_path =public_path('uploads/'. $producto->imagen);
        if(File::exists($imagen_path)){
            unlink($imagen_path);
            
        }
        return redirect()->route('producto.index');
    }
}
