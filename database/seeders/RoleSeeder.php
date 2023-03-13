<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(array(
            'name' => 'editor',
            'id' => Role::EDITOR,
        ));

        Role::create(array(
            'name' => 'admin',
            'id' => Role::ADMIN,
        ));

    }
}
