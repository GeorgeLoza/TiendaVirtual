@extends('layout.app')

@section('titulo')
Pedido
@endsection

@section('contenido')

<form action="{{ route('pedido.store') }}" method="POST" novalidate>
    @csrf
    <input type="submit" class="ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        value="Confirma pedido">
    
</form>


<div
    class="md:w-full p-5 bg-white  rounded-lg shadow-xl relative overflow-x-auto  sm:rounded-lg max-h-96 overflow-y-auto">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Producto</th>
                <th class="px-6 py-3">cantidad</th>
                <th class="px-6 py-3">Precio</th>
                <th class="px-6 py-3">Subtotal</th>
                <th class="px-6 py-3">operaciones</th>

            </tr>
        </thead>
        <tbody>
            
            @php
            $total = 0;
            @endphp
            @foreach ($pedidos as $index => $pedido)

            <tr class="bg-white border-b hover:bg-gray-50">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">{{ $index +1}}</td>
                <td class="px-6 py-4">{{ $pedido->producto->descripcion }}</td>
                <form action="{{ route('detallePedido.update', $pedido->id) }}" method="POST" novalidate>
                    @method('PUT')
                    @csrf

                <td class="px-6 py-4">
                    <input id="cantidad" class="text-center border-2" name="cantidad" type="number"
                        value="{{ $pedido->cantidad }}">
                        @error('cantidad')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
                </td>
                <td class="px-6 py-4">{{ $pedido->producto->precio }}</td>
                <td class="px-6 py-4">{{ $pedido->subtotal }}</td>
                <td class="flex gap-2">


                        <input id="precio" hidden name="precio" type="number" value="{{ $pedido->producto->precio }}">

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>

                        </button>
                    </form>
                    <form method="POST" action="{{route('detallePedido.destroy',$pedido->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>

                    </form>
                </td>
            </tr>
            @php
            $total += $pedido->cantidad * $pedido->producto->precio;
            @endphp
            @endforeach
            <tr>
                <td colspan="4">Total : </td>
                <td> {{ $total }}</td>
            </tr>

        </tbody>
    </table>


</div>


@endsection