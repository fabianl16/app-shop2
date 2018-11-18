<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $product->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    public function console()
    {
        return $this->belongsTo(Console::class);
    }

    // $product->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage)
            $featuredImage = $this->images()->first();

        if ($featuredImage) {
            return $featuredImage->url;
        }

        // default
        return '/images/default.gif';
    }

    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;

        return 'General';
    }
    public function getConsoleNameAttribute()
    {
        if ($this->console)
            return $this->console->name;

        return 'General';
    }
}
