<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(BandaSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(CancionSeeder::class);
        
        // \App\Models\User::factory(10)->create();
    }
}
