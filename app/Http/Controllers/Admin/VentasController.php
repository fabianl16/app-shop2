<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cart;
class VentasController extends Controller
{
    public function index()
    {
        $ventas = cart::where('status', 'Pending')->get();
        return view('admin.ventas.index', compact('ventas'));
    }
    public function show($id)
    {
        $venta = cart::find($id);
        return view('Admin.Ventas.ventas.show', compact('venta'));
    }
}