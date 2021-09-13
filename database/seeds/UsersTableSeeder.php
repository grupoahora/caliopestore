<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        User::create([
            'name'=>'David Cortes',
            'email'=>'cortesmirandaedavid19@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('Admin');
        User::create([
            'name' => 'Andrespyg',
            'email' => 'andrespatino@grupoahora.co',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
    }
}
