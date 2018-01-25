<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

    	$notification = 'Producto agregado correctamente.';
        return back()->with(compact('notification'));
    }
    public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);
        //verificamos si carrito_id coincide con el carrito_id del usuario autenticado
        if ($cartDetail->cart_id == auth()->user()->cart->id)
    	   $cartDetail->delete();
        $notification = 'El producto se ha eliminado del carrito de compras correctamente.';
    	return back()->with(compact('notification'));
    }
}
