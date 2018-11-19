<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para la categoría.',
        'name.min' => 'El nombre de la categoría debe tener al menos 3 caracteres.',
        'image' => 'Los archivos de subida de imagen deben ser de terminacion jpeg, png, bmp, gif, o svg',
        'description.max' => 'La descripción corta solo admite hasta 250 caracteres.'
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'image' => 'image',
        'description' => 'max:250'
    ];

	protected $fillable = ['name', 'description', 'image'];

    // $category->products
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/categories/'.$this->image;
        // else
        $firstProduct = $this->products()->first();
        if ($firstProduct)
            return $firstProduct->featured_image_url;

        return '/images/default.gif';
    }
}
