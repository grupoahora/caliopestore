<?php

use App\Product;
use Illuminate\Database\Seeder;
use App\tag;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = factory(App\Product::class, 10)->create();
        
        foreach ($products as $product){
            $product->tags()->sync([1,10]);
        }
    }
}
/* $this->tags()->sync($request->get('tags')); */