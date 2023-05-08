<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetallePedidoController extends Controller
{
    public function index()
    {

        $userId = Auth::id();

        $pedidos = DetallePedido::with(['pedido', 'producto'])
            ->where('pedido_id', '=', null)
            ->where('user_id', '=', $userId)
            ->get();
        
            return view('pedido.index', compact('pedidos'));
            
        
    }

    public function store(Request $request)
    {
        $unico = DB::select('SELECT * FROM detalle_pedidos WHERE pedido_id IS null and producto_id = ? and user_id = ?', [$request->producto_id, $request->user_id]);

        if ($unico) {
            return redirect()->back()->with('message', 'Este articulo ya esta en tu carrito');
        } else {
            DetallePedido::create([
                'producto_id' => $request->producto_id,
                'cantidad' => $request->cantidad,
                'subtotal' => $request->subtotal,
                'user_id' => $request->user_id,
            ]);

            return redirect()->back();
        }
    }
    public function update(Request $request, DetallePedido $detallePedido)
    {

        $this->validate($request, [
            'cantidad' => 'required|min:1|max:100',
            'precio' => 'required',
        ]);

        $registro = DetallePedido::find($detallePedido->id);

        $registro->cantidad = $request->cantidad;
        $registro->subtotal = $request->precio * $request->cantidad;

        $registro->save();
        return redirect()->back();
    }
    public function destroy(DetallePedido $detallePedido)
    {

        $detallePedido->delete();

        return redirect()->back();
    }
}
