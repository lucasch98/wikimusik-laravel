<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Banda;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $img = file_get_contents("https://4.bp.blogspot.com/-dlRnqQfIzJk/V25xm-4DAHI/AAAAAAAABDo/P4LIGBQM5C4j4W84_uzKcOm_v4yYpdUgQCLcB/s1600/711KOnivDrL._SL1500_%2B%25281%2529.jpg");
      Album::create(array(
        'nombre'=>'High Voltage',
        'banda_id' => Banda::where('nombre', 'AC/DC')->first()->id,
        'imagen' => base64_encode($img),
       'fecha' => 1976,
        'duracion' => "00:44:15"
    ));

    $img = file_get_contents("https://imagizer.imageshack.com/v2/600x595q90/923/GKdyMC.jpg");
      Album::create(array(
        'nombre'=>'Reload',
        'banda_id' => Banda::where('nombre', 'Metallica')->first()->id,
        'imagen' => base64_encode($img),
       'fecha' => 1997,
        'duracion' => "00:43:15"
    ));

    $img = file_get_contents("https://img.discogs.com/uE7t7ZjjCV4ENJk3zA_blJKbi8c=/fit-in/600x606/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-6214566-1413904595-2359.jpeg.jpg");
      Album::create(array(
        'nombre'=>'V',
        'banda_id' => Banda::where('nombre', 'Maroon 5')->first()->id,
        'imagen' => base64_encode($img),
       'fecha' => 2014,
        'duracion' => "00:43:57"
    ));

    $img = file_get_contents("https://img.discogs.com/98l_SH2P7uLf0-95_cy8-F8AtvU=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-12218783-1530734657-1609.jpeg.jpg");
      Album::create(array(
        'nombre'=>'Skrillex and diplo',
        'banda_id' => Banda::where('nombre', 'Jack U')->first()->id,
        'imagen' => base64_encode($img),
       'fecha' => 2015,
        'duracion' => "00:35:25"
    ));

    }
}
