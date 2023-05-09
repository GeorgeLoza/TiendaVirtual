@extends('layout.app')
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
Pedidos
@endsection

@section('contenido')


<div class="md:flex md:items-start">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($pedidos as $index =>$pedido)
        
        <div
        
        class=" @switch($pedido->estado)
        @case('Rechazado')
        border-red-600
            @break
     
        @case('Pendiente')
        border-yellow-600
            @break
            @case('Confirmado')
            border-green-600
            @break
     
        @default
            Default case...
    @endswitch w-auto p-6 bg-white  border  rounded-lg shadow">

            @foreach($pedido->detallePedido as $detalle)
            @if ($loop->first)
            <p>Cliente: <span>{{ $detalle->user->name }}</span></p>
            @endif
            @endforeach

            
            <p>Estado: <span 
                @switch($pedido->estado)
        @case('Rechazado')
        class="px-2 bg-red-200 rounded"
            @break
     
        @case('Pendiente')
        class="px-2 bg-yellow-200 rounded"
            @break
            @case('Confirmado')
            class="px-2 bg-green-200 rounded"
            @break
     
        @default
            Default case...
    @endswitch
                >{{$pedido->estado}}</span></p>
            <p>Fecha: <span>{{$pedido->fecha}}</span></p>




            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                    <tr>

                        <th class="px-6 py-3">Producto</th>
                        <th class="px-6 py-3">cantidad</th>
                        <th class="px-6 py-3">Precio</th>
                        <th class="px-6 py-3">Subtotal</th>

                    </tr>
                </thead>
                <tbody>

                    @php
                    $total = 0;
                    @endphp
                    @foreach($pedido->detallePedido as $detalle)

                    <tr class="bg-white border-b hover:bg-gray-50">

                        <td class="px-6 py-4">{{ $detalle->producto->descripcion }}</td>
                        <td class="px-6 py-4">{{ $detalle->cantidad }}</td>
                        <td class="px-6 py-4">{{ $detalle->producto->precio }}</td>
                        <td class="px-6 py-4">{{ $detalle->subtotal }}</td>
                        

                    </tr>
                    @php
                    $total += $detalle->cantidad * $detalle->producto->precio;
                    @endphp
                    @endforeach
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <td class="px-6 py-4" colspan="3">Total : </td>
                        <td class="px-6 py-4"> {{ $total }}</td>
                    </thead>

                </tbody>
            </table>
            <div class="flex gap-2">
                <form action="{{ route('pedido.update', $pedido->id) }}" method="POST" novalidate>
                    @method('PUT')
                    @csrf

                    <input type="hidden" id="estado" name="estado" value="Confirmado">
                    <input type="submit" value="Confirmar"
                        class="bg-sky-600 hover:bg-sky-700 transition-color cursor-pointer uppercase  font-bold  p-3 text-white rounded-lg">

                </form>
                <form action="{{ route('pedido.update', $pedido->id) }}" method="POST" novalidate>
                    @method('PUT')
                    @csrf

                    <input type="hidden" id="estado" name="estado" value="Rechazado">
                    
                    <input type="submit" value="Rechazar"
                        class="bg-red-500 hover:bg-red-600  transition-color cursor-pointer uppercase  font-bold  p-3 text-white rounded-lg">

                </form>
            </div>
        </div>
        @endforeach

    </div>




</div>



@endsection