<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function store()
    {
        $pedido=Pedido::create([
            'estado' => "Pendiente",
            'fecha' => now(),
            
        ]);
        DetallePedido::whereNull('pedido_id')
        ->where('user_id', Auth::user()->id)
        ->update(['pedido_id' => $pedido->id]);
        return redirect()->route('index');
    }

}
