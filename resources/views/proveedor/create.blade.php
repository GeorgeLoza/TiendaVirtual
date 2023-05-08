@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
Crear nuevo proveedor
@endsection
@section('contenido')
<div class="md:flex md:items-center justify-center">
    
    <div class="md:w-1/2  p-10 bg-white  rounded-lg shadow-xl ">
        <form action="{{ route('proveedor.store') }}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">nombre</label>
                <input id="nombre" name="nombre" type="text" placeholder="Escriba el nombre del proveedor"
                    value="{{old('nombre')}}"
                    class="border p-3 w-full rounded-lg @error('nombre') border-red-500 @enderror">
                @error('nombre')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="direccion" class="mb-2 block uppercase text-gray-500 font-bold">direccion</label>
                <input id="direccion" name="direccion" type="text"
                    placeholder="Escriba el nombre o direccion del producto" value="{{ old('direccion') }}" 
                    class="border p-3 w-full rounded-lg @error('direccion') border-red-500 @enderror">
                @error('direccion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="celular" class="mb-2 block uppercase text-gray-500 font-bold">celular</label>
                <input id="celular" name="celular" type="phone"
                    placeholder="Escriba el nombre o celular del producto" value="{{ old('celular') }}" 
                    class="border p-3 w-full rounded-lg @error('direccion') border-red-500 @enderror">
                @error('celular')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="correo" class="mb-2 block uppercase text-gray-500 font-bold">correo</label>
                <input id="correo" name="correo" type="email"
                    placeholder="Escriba el nombre o correo del producto" value="{{ old('correo') }}" 
                    class="border p-3 w-full rounded-lg @error('correo') border-red-500 @enderror">
                @error('correo')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>
            
            <input type="submit" value="Registrar"
                class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase  font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>
@endsection