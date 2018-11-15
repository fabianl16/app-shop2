<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {





    	$client = auth()->user(); 
    	$cart = $client->cart;
    	
        if($cart->details->count()<1){
            $notification_error = 'Aun no has agregado productos';
        return back()->with(compact('notification_error'));
        }


        $cart->status = 'Pending';
    	$cart->order_date = Carbon::now();
    	$cart->save(); // UPDATE

        foreach ($cart->details as $detail) {
            $product = $detail->product;
            $product->stock = $product->stock-$detail->quantity;
            $product->save(); 
        }


    	$admins = User::where('admin', true)->get();
    	Mail::to($admins)->send(new NewOrder($client, $cart));

    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía mail!';
    	return back()->with(compact('notification'));
    }
}
