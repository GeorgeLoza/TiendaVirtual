@extends('layout.app')

@section('titulo')
    Registrate en Traffic
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center ">
<div class="md:w-6/12 p-5">
<img src="{{asset('img/sign_up.svg')}}" alt="">
</div>
<div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
    <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf 
        <div class="mb-3">
            <label for="name" class="mb-1 block uppercase text-gray-500 font-bold">Nombre</label>
            <input id="name" name="name" type="text" placeholder="Tu Nombre" value="{{old('name')}}" class="border p-2 w-full rounded-lg @error('name') border-red-500 @enderror">
            @error('name') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="username" class="mb-1 block uppercase text-gray-500 font-bold">User Name</label>
            <input id="username" name="username" type="text" placeholder="Tu Nombre de Usuario" value="{{old('username')}}" class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror">
            @error('username') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>@enderror
        </div>

        <div class="mb-3">
            <label for="email" class="mb-1 block uppercase text-gray-500 font-bold">Email</label>
            <input id="email" name="email" type="email" placeholder="Tu email de registro" value="{{old('email')}}" class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror">
            @error('email') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="direccion" class="mb-1 block uppercase text-gray-500 font-bold">direccion</label>
            <input id="direccion" name="direccion" type="text" placeholder="Donde vives?" value="{{old('direccion')}}" class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror">
            @error('direccion') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="telefono" class="mb-1 block uppercase text-gray-500 font-bold">telefono</label>
            <input id="telefono" name="telefono" type="phone" placeholder="Tu telefono personal" value="{{old('telefono')}}" class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror">
            @error('telefono') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <input id="rol" name="rol" type="hidden"  value="cliente" class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror">
        </div>
        <div class="mb-3">
            <label for="password" class="mb-1 block uppercase text-gray-500 font-bold">Password</label>
            <input id="password" name="password" type="password" placeholder="Tu password de registro"  class="border p-2 w-full rounded-lg @error('password') border-red-500 @enderror">
            @error('password') <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>@enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="mb-1 block uppercase text-gray-500 font-bold">Repetir Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu password"  class="border p-2 w-full rounded-lg ">
        </div>
        
        <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase  font-bold w-full p-3 text-white rounded-lg">
    </form>
    </div>
</div>
@endsection