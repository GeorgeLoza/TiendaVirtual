@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
Editar categoria
@endsection
@section('contenido')
<div class="md:flex md:items-center justify-center">
    
    <div class="md:w-1/2 p-10 bg-white  rounded-lg shadow-xl ">
        <form action="{{ route('categoria.update', $categoria->id) }}" method="POST" novalidate>
            @method('PUT')
            @csrf
            <div class="mb-5">
                <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input id="nombre" name="nombre" type="text"
                    placeholder="Escriba el nombre de la categoria" value="{{ $categoria->nombre }}" 
                    class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror">
                @error('nombre')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                <input id="descripcion" name="descripcion" type="text"
                    placeholder="Escriba el nombre o descripcion del producto" value="{{ $categoria->descripcion }}" 
                    class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">
                @error('descripcion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            
            <input type="submit" value="Actualizar"
                class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase  font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>

@endsection