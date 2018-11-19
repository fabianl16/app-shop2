<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use App\CartDetail;
use App\Cart;
use Mail;

class CartController extends Controller
{
    public function update(Request $request)
    {
        
if($request->paymentId && count(Cart::where('paymentId', $request->paymentId)->get()) == 0){


        $client = auth()->user(); 
        $cart = $client->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $cart->paymentId = $request->paymentId;
        $cart->save(); // UPDATEk
         foreach ($cart->details as $detail) {
            $product = $detail->product;
            $product->stock = $product->stock-$detail->quantity;
            $product->sold = $product->sold + $detail->quantity;
            $product->save(); 
        }

        return view('User.paysuccess');



        }

        return view('User.paysuccess');


}

 public function cancel(Request $request){        
        return view('User.paycancel');
    }



}
