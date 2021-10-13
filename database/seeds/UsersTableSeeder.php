<?php

use Illuminate\Database\Seeder;

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
       
        $role1_user = User::create([
            'name'=>'David',
            'surname'=>'Cortes',
            'email'=>'cortesmirandaedavid19@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('Client');;
        $role1_user->profile()->create([
            /* 'first_name' => $role1_user->name, */
        ]);
        
        $role2_user = User::create([
            'name' => 'Andres',
            'surname' => 'Patino',
            'email' => 'andrespatino@grupoahora.co',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
        $role2_user->profile()->create([
            /* 'first_name' => $role2_user->name, */
        ]);
        
        $role3_user = User::create([
            'name' => 'Andres',
            'surname' => 'Grimaldos Cashier',
            'email' => 'andrespatino2@grupoahora.co',
            'password' => bcrypt('12345678')
        ])->assignRole('Cashier');
        $role3_user->profile()->create([
            /* 'first_name' => $role3_user->name, */
        ]);
        
    }
}
