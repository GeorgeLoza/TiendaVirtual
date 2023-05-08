@extends('layout.app')
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
Trabajadores
@endsection

@section('contenido')
<a href="{{route('user.create')}}" class="flex  mb-5">
    <button class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Crear
    </button>
</a>

<div class="md:flex md:items-start">
    
    <div
        class="md:w-full p-5 bg-white  rounded-lg shadow-xl relative overflow-x-auto  sm:rounded-lg max-h-96 overflow-y-auto">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Direccion</th>
                    <th class="px-6 py-3">Telefono</th>
                    <th class="px-6 py-3">Rol</th>
                    <th class="px-6 py-3">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index =>$user)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">{{ $index +1}}
                    </td>
                    
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->direccion }}</td>
                    <td class="px-6 py-4">{{ $user->telefono }}</td>
                    <td class="px-6 py-4">{{ $user->rol }}</td>
                    <td class="px-6 py-4 flex gap-1">
                        <a href="{{route('user.edit',$user->id)}}"
                            class="flex bg-green-500 hover:bg-green-600 p-2 rounded text-white font-bold mt-4 cursor-pointer ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>

                        <form method="POST" action="{{route('user.destroy',$user->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>

                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>

@endsection