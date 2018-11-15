<?php

namespace App\Http\Controllers\Admin;

use App\CartDetail;
use App\Http\Controllers\Controller;

use App\ProductImage;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); // listado
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories')); // formulario de registro
    }

    public function store(Request $request)
    {


        // validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.min' => 'No se admiten valores negativos y un videojuego no puede valer menos d 200.'
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:200'
        ];
        $this->validate($request, $rules, $messages);

    	// registrar el nuevo producto en la bd
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id == 0 ? null : $request->category_id;
        $product->stock = $request->stock;
        $product->save(); // INSERT

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'categories')); // form de edición
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.max' => 'Un videojuego no puede costar mas de 2000',
            'price.min' => 'No se admiten valores negativos.'
        ];
        $rules = [
            'name' => 'required|min:3|max:2000',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);
        // dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id == 0 ? null : $request->category_id;
        $product->save(); // UPDATE

        return redirect('/admin/products');
    }

    public function destroy($id)
    {
        CartDetail::where('product_id', $id)->delete();
        ProductImage::where('product_id', $id)->delete();

        $product = Product::find($id);
        $product->delete(); // DELETE

        return back();
    }

   public function stock()
   {
    $products = Product::paginate(9);
    return view('admin.products.stock', compact('products'));
   }

   

}
