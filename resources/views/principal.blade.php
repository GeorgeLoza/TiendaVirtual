@extends('layout.app')

@section('titulo')
Productos de Happy Feet
@endsection
@section('contenido')
@if (session('message'))
<div x-data="{ show: true }" x-show="show" class="fixed bottom-5 right-5">
    <div class="bg-yellow-200 text-yellow-700 rounded-md px-4 py-2 shadow-md">
        <p>{{ session('message') }}</p>
    </div>
</div>
<script>
    setTimeout(function() {
        document.querySelector('.fixed').remove();
    }, 3000);
</script>
@endif
<!--Grid -->
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 ">
    @foreach ($productos as $index =>$producto)
    <!--card-->

    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
        <!--imagen del producto -->
        <a href="#">
            <img class="p-8 rounded-t-lg" src="{{asset ('uploads').'/'.$producto->imagen}}" />
        </a>
        <!--Fin imagen del producto -->
        <!--detalle del card -->
        <div class="px-5 pb-5">
            <!--nombre del producto -->
            <a href="#">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">{{ $producto->descripcion }}</h5>
            </a>
            <!--fin nombre del producto -->
            <!--descripcion del producto -->
            <div class="flex items-center mt-2.5 mb-5">
                <p>Modelo: {{ $producto->modelo }}</p>
                <p>Talla: {{ $producto->talla }}</p>
                
            </div>
            <!--Fin descripcion del producto -->
            <div class="flex items-center justify-between">
                <!--precio del producto -->
                <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $producto->precio }}</span>
                <!--agregar al carrito -->
                @auth
                

                  <form action="{{route('detallePedido.store')}}" method="POST">
                    @csrf
                    <input name="producto_id" type="hidden" value="{{$producto->id}}" >
                    <input name="cantidad" type="hidden" value="1">
                    <input name="subtotal" type="hidden" value="{{$producto->precio}}">
                    <input name="user_id" type="hidden" value="{{auth()->user()->id}}">
                    <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                  
                            </button>

                  </form>

                  
                @endauth
                
            </div>
        </div>
        <!--detalle del card -->
    </div>
    
    <!--fin card-->
    @endforeach
</div>
<!-- Fin Grid-->

@endsection