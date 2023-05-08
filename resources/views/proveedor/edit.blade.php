@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
Editar Proveedor
@endsection
@section('contenido')
<div class="md:flex md:items-center justify-center">
    
    <div class="md:w-1/2 p-10 bg-white  rounded-lg shadow-xl ">
        <form action="{{ route('proveedor.update', $proveedor->id) }}" method="POST" novalidate>
            @method('PUT')
            @csrf
            <div class="mb-5">
                <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">nombre</label>
                <input id="nombre" name="nombre" type="text" placeholder="Escriba el nombre del proveedor"
                    value="{{ $proveedor->nombre }}"
                    class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror">
                @error('nombre')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="direccion" class="mb-2 block uppercase text-gray-500 font-bold">direccion</label>
                <input id="direccion" name="direccion" type="text"
                    placeholder="Escriba indique la direccion del proveedor" value="{{ $proveedor->direccion }}" 
                    class="border p-3 w-full rounded-lg @error('direccion') border-red-500 @enderror">
                @error('direccion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="celular" class="mb-2 block uppercase text-gray-500 font-bold">celular</label>
                <input id="celular" name="celular" type="phone"
                    placeholder="Escriba el numero de contacto" value="{{ $proveedor->celular }}" 
                    class="border p-3 w-full rounded-lg @error('direccion') border-red-500 @enderror">
                @error('celular')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="correo" class="mb-2 block uppercase text-gray-500 font-bold">correo</label>
                <input id="correo" name="correo" type="email"
                    placeholder="Escriba el correo del proveedor" value="{{ $proveedor->correo }}" 
                    class="border p-3 w-full rounded-lg @error('correo') border-red-500 @enderror">
                @error('correo')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
              
            <input type="submit" value="Actualizar"
                class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase  font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>

@endsection