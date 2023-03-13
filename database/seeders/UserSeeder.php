<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Lucas Cervelli Haderne',
            'email' => 'lucasch98.lch@gmail.com',
            'role_id' => Role::ADMIN,
            'password' => bcrypt('1234'),
        ));

        User::create(array(
            'name' => 'Tucky',
            'email' => 'mt@cs.uns.edu.ar',
            'role_id' => Role::ADMIN,
            'password' => bcrypt('1234'),
        ));

       User::create(array(
            'name' => 'usuario',
            'email' => 'probando@gmail.com',
            'role_id' => Role::EDITOR,
            'password' => bcrypt('1234'),
        ));



    }
}
