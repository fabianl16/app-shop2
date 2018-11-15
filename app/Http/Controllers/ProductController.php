<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class ProductController extends Controller
{
    public function show($id)
    {
    	$product = Product::find($id);
    	$images = $product->images;
    	
    	$imagesLeft = collect();
    	$imagesRight = collect();
    	foreach ($images as $key => $image) {
    		if ($key%2==0)
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    	}

    	return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight'));
    }

    public function order()
   {
    $user = Auth()->user();
    $carts = Cart::where('user_id', $user->id)->where('status', 'Pending')->get();


    return view('User.index', compact('carts'));
   }
}
