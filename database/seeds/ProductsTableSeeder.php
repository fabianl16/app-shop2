<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Category;
use App\ProductImage;
use App\Console;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(Category::class, 5)->create();
    	factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/

        $categories = factory(Category::class, 4)->create();
        $consoles = factory(Console::class, 4)->create();

        $consoles->each(function ($console) {
            $products = factory(Product::class, 5)->make();
            $console->products()->saveMany($products);

        });


        $categories->each(function ($category) {
            $products = factory(Product::class, 5)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p) {
                $images = factory(ProductImage::class, 3)->make();
                $p->images()->saveMany($images);
            });
        });

        /*$users = factory(App\User::class, 3)
           ->create()
           ->each(function ($u) {
                $u->posts()->save(factory(App\Post::class)->make());
            });*/
    }
}
