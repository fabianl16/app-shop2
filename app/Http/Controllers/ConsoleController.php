<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Console;

class ConsoleController extends Controller
{
    public function show(Console $console)
    {
    	$products = $console->products()->paginate(10);
    	return view('consoles.show')->with(compact('console', 'products'));
    }
}
