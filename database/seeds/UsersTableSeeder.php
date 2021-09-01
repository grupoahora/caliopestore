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
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',
        ]);

        $user = User::create([
            'name'=>'David Cortes',
            'email'=>'cortesmirandaedavid19@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('Admin');
        $user = User::create([
            'name' => 'Andrespyg',
            'email' => 'andrespatino@grupoahora.co',
            'password' => bcrypt('12345678')
        ]);

        $user->roles()->sync(1);
    }
}
