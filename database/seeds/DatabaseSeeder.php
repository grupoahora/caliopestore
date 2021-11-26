<?php

use App\Category;
use App\Subcategory;
use App\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrencySeeder::class);
        $this->call(PaymentPlatformSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(BusinessTableSeeder::class);
        $this->call(PrinterTableSeeder::class);
        factory(App\Color::class, 10)->create();
        factory(App\Size::class, 10)->create();
        factory(App\Tag::class, 10)->create();
        factory(App\Category::class, 10)->create()->each(function ($category) {
            $category->images()->saveMany(factory(App\Image::class, 1)->make());
        });
        factory(App\Subcategory::class, 15)->create();
        factory(App\Product::class,1000)->create()->each(function($product){
            $product->tags()->attach($this->array(rand(1, 10)));
            $product->sizes()->attach($this->array(rand(1, 10)));
            $product->images()->saveMany(factory(App\Image::class, 4)->make());
            $product->textures()->saveMany(factory(App\Texture::class, 1)->make());
        });
        factory(App\SocialMedia::class, 4)->create();
        
        
        
        
    }
    public function array($max)
    {
        $values = [];
        for($i=1; $i < $max; $i++){
            $values[] = $i;
        }
        return $values;
    }
}
