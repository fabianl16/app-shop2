<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;

class CartDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $client = auth()->user(); 
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cart = $client->cart;
        $cartDetail->quantity = $request->quantity;

        if($cartDetail->quantity<1){
            $notification_error = 'Agrega 1 producto o mas de 1 para agregar al carrito';
        return back()->with(compact('notification_error'));

        }

        if($cartDetail->quantity > $cartDetail->product->stock){
             $notification_stock = 'Stock insuficiente';
        return back()->with(compact('notification_stock'));
        }


        $cartDetail->price = $request->price;
    	$cartDetail->save();

        

		$notification = 'El producto se ha cargado a tu carrito de compras exitosamente!';
    	return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
       
         
    	$cartDetail = CartDetail::find($request->cart_detail_id);
    	
    	if ($cartDetail->cart_id == auth()->user()->cart->id)
    		$cartDetail->delete();


    	$notification = 'El producto se ha eliminado del carrito de compras correctamente.';
    	return back()->with(compact('notification'));
    }
}
