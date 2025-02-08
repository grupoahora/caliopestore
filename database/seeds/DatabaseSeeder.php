<?php

namespace Database\Seeders;

use App\Category;
use App\SocialMedia;
use App\Subcategory;
use App\Tag;
use BusinessTableSeeder;
use CurrencySeeder;
use Illuminate\Database\Seeder;
use PaymentPlatformSeeder;
use PrinterTableSeeder;
use RoleSeeder;
use UsersTableSeeder;
use App\Color;
use App\Size;
use App\Image;
use App\Product;
use App\Texture;

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

        // Crear 10 colores
        Color::factory()->count(10)->create();

        // Crear 10 tamaños
        Size::factory()->count(10)->create();

        // Crear 10 etiquetas
        Tag::factory()->count(10)->create();

        // Crear 10 categorías con imágenes
        Category::factory()->count(10)->create()->each(function ($category) {
            $category->images()->saveMany(Image::factory()->count(1)->make());
        });

        // Crear 15 subcategorías
        Subcategory::factory()->count(15)->create();

        // Crear 1000 productos con relaciones
        Product::factory()->count(1000)->create()->each(function ($product) {
            $product->tags()->attach($this->array(rand(1, 10)));
            $product->sizes()->attach($this->array(rand(1, 10)));
            $product->images()->saveMany(Image::factory()->count(4)->make());
            $product->textures()->saveMany(Texture::factory()->count(1)->make());
        });

        // Crear 3 redes sociales
        SocialMedia::factory()->count(3)->create();
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
