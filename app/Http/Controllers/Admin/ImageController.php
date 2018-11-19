<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use File;
use Image;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured', 'desc')->get();
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id)
    {

         $messages = [
            'photo.image' => 'Los archivos de subida de imagen deben ser de terminacion jpeg, png, bmp, gif, o svg'
        ];
        $rules = [
            'photo' => 'image'
        ];
        $this->validate($request, $rules, $messages);
    	// guardar la img en nuestro proyecto
    	$file = $request->file('photo');
        $img = Image::make($file);
        $img->resize(600, 600);
    	$path = public_path() . '/images/products/';
	    $fileName = uniqid() . $file->getClientOriginalName();

    	$moved = $img->save($path . $fileName);

        //$file->move($path, $fileName);

        // open an image file


// now you are able to resize the instance


// finally we save the image as a new file
    	
    	// crear 1 registro en la tabla product_images
    	if ($moved) {
	    	$productImage = new ProductImage();
	    	$productImage->image = $fileName;
	    	// $productImage->featured = false;
	    	$productImage->product_id = $id;
	    	$productImage->save(); // INSERT
    	}


    	return back();
    }

    public function destroy(Request $request, $id)
    {
    	// eliminar el archivo
    	$productImage = ProductImage::find($request->image_id);
    	if (substr($productImage->image, 0, 4) === "http") {
    		$deleted = true;
    	} else {
    		$fullPath = public_path() . '/images/products/' . $productImage->image;
    		$deleted = File::delete($fullPath);
    	}

    	// eliminar el registro de la img en la bd
    	if ($deleted) {
    		$productImage->delete();
    	}

    	return back();
    }

    public function select($id, $image)
    {
        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }
}
