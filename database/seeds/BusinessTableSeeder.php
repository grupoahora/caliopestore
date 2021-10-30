<?php

use Illuminate\Database\Seeder;
use App\Business;
class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name'=>'Nombre de la empresa.',
            'description'=>'Descripción corta de la empresa.',
            'logo'=>'/galio/assets/img/logo/logo.png',
            'mail'=>'Ejemplo@gmail.com',
            'address'=>'8888 Cummings Vista Apt. 101, Susanbury, NY 95473',
            'ruc'=>'15247895632',
            'phone'=>'313 313 1442',
            'latitude'=> '7.906287',
            'length'=> '-72.486743',
            'contact_text'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga dolor dolorum numquam totam modi qui, rem repellat provident. Ipsum iure fugiat doloremque hic possimus atque iusto perspiciatis culpa necessitatibus harum.',
            'hours_of_operation'=>'Lunes - Sabado: 8 AM a 22 PM',
            'google_maps_link'=> 'https://goo.gl/maps/JriSw2hyLowgCbxN7',
        ]);
    }
}
