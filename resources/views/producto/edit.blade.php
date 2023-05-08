@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
Crear nuevo producto
@endsection
@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone"
            class="dropzone border-dashed border-2 h-96 w-full  rounded flex justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-1/2 p-10 bg-white  rounded-lg shadow-xl ">
        <form action="{{ route('producto.update', $producto->id) }}" method="POST" novalidate>
            @method('PUT')
            @csrf
          
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                <input id="descripcion" name="descripcion" type="text"
                    placeholder="Escriba el nombre o descripcion del producto" value="{{ $producto->descripcion }}" 
                    class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">
                @error('descripcion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="modelo" class="mb-2 block uppercase text-gray-500 font-bold">Modelo</label>
                <input id="modelo" name="modelo" type="text" placeholder="Escriba el modelo"
                    value="{{ $producto->modelo }}"
                    class="border p-3 w-full rounded-lg @error('modelo') border-red-500 @enderror">
                @error('modelo')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="talla" class="mb-2 block uppercase text-gray-500 font-bold">talla</label>
                <input id="talla" name="talla" type="text" placeholder="Escriba la talla del producto"
                    value="{{ $producto->talla }}"
                    class="border p-3 w-full rounded-lg @error('talla') border-red-500 @enderror">
                @error('talla')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="cantidad" class="mb-2 block uppercase text-gray-500 font-bold">Stock</label>
                <input id="cantidad" name="cantidad" type="number" placeholder="Stock disponible"
                    value="{{ $producto->cantidad }}"
                    class="border p-3 w-full rounded-lg @error('cantidad') border-red-500 @enderror">
                @error('cantidad')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="precio" class="mb-2 block uppercase text-gray-500 font-bold">precio</label>
                <input id="precio" name="precio" type="number" step="0.01"
                    placeholder="Coloca el precio en Bolivianos" value="{{ $producto->precio }}"
                    class="border p-3 w-full rounded-lg @error('precio') border-red-500 @enderror">
                @error('precio')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="categoria_id" class="mb-2 block uppercase text-gray-500 font-bold">categoria</label>
                <select id="categoria_id" name="categoria_id"
                    class="border p-3 w-full rounded-lg @error('categoria_id') border-red-500 @enderror">
                    <optgroup label="Categoria Actual">
                    <option selected value="{{ $producto->categoria->id}}">{{$producto->categoria->nombre}}</option>
                    </optgroup>
                    <optgroup label="Todas las categorias">
                    @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                    </optgroup>
                    
                </select>

            </div>
            <div class="mb-5">
                <label for="proveedor_id" class="mb-2 block uppercase text-gray-500 font-bold">proveedor</label>
                <select id="proveedor_id" name="proveedor_id"
                    class="border p-3 w-full rounded-lg @error('proveedor_id') border-red-500 @enderror">
                    <optgroup label="Proveedor Actual">
                    <option selected value="{{ $producto->proveedor->id}}">{{$producto->proveedor->nombre}}</option>
                    </optgroup>
                    <optgroup label="Todas las categorias">
                    @foreach($proveedores as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                    @endforeach
                    </optgroup>
                    
                </select>

            </div>



            <div class="mb-5">
                <input type="hidden" name="imagen" value="{{ $producto->imagen }}">
                @error('imagen')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <input type="submit" value="Actualizar"
                class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase  font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>

@endsection