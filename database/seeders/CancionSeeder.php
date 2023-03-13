<?php

namespace Database\Seeders;

use App\Models\Cancion;
use App\Models\Album;
use App\Models\Banda;
use Illuminate\Database\Seeder;



class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cancion::create(array(
            'nombre'=>'TNT',
           'album_id' => Album::where('nombre', 'High Voltage')->first()->id,
            'duracion' => '00:03:34',
            'url' => 'https://open.spotify.com/track/7LRMbd3LEoV5wZJvXT1Lwb?si=c989e06d81fe4f39'
        ));

        Cancion::create(array(
            'nombre'=>'Fuel',
           'album_id' => Album::where('nombre', 'Reload')->first()->id,
            'duracion' => '00:04:29',
            'url' => 'https://open.spotify.com/track/6FUwPb4mGlUDbx42uspXaZ?si=81e87196f68d41d7'
        ));

        Cancion::create(array(
            'nombre'=>'Mind(feat.Kai)',
           'album_id' => Album::where('nombre', 'Skrillex and diplo')->first()->id,
            'duracion' => '00:04:02',
            'url' => 'https://open.spotify.com/track/6ZpR2XFuQJSHAQwg9495KZ?si=b02566f2bd344d10'
        ));


        Cancion::create(array(
            'nombre'=>'Sugar',
           'album_id' => Album::where('nombre', 'V')->first()->id,
            'duracion' => '00:03:55',
            'url' => 'https://open.spotify.com/track/2iuZJX9X9P0GKaE93xcPjk?si=84c0f8aabcf14907'
        ));
    }
}
