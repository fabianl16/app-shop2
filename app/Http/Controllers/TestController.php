<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Console;

class TestController extends Controller
{

    public function welcome()
    {
    	$categories = Category::has('products')->get();
    	$consoles = Console::has('products')->get();
    	return view('welcome')->with(compact('categories', 'consoles'));
    }

}
