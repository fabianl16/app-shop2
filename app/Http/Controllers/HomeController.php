<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

    	if(auth()->user()->admin){
    		return view ('admin/home');
    	}
        return view('home');
    }

    

}
