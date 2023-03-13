<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banda;
use App\Models\Genero;

class BandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = file_get_contents("https://1000logos.net/wp-content/uploads/2016/10/ACDC-Logo.png");
        Banda::create(array(
            'nombre'=>'AC/DC',
            'descripcion'=>'AC / DC es una banda de rock australiana formada en Sydney en 1973 por los hermanos Malcolm y Angus Young, nacidos en Escocia. Su música ha sido descrita de diversas formas como hard rock, blues rock y heavy metal, pero la banda misma lo llama simplemente "rock and roll."',
            
            'integrantes'=>'Brian Johnson, Malcolm Young, Phil Rudd, Angus Young, Cliff Williams',
           'genero_id' => Genero::where('nombre', 'Rock')->first()->id,
            'imagen' => base64_encode($img),
            'origen' => 'Sídney, Nueva Gales del Sur, Australia',
            'historia' => 'En noviembre de 1973, Malcolm y Angus Young formaron AC/DC con el bajista Larry Van Kriedt,el vocalista Dave Evansy el ex baterista deMasters Apprentices Colin Burgess. [16] Gene Pierson reservó la banda para tocar en el club nocturno Chequers en la víspera de Año Nuevo, 1973. [17] En ese momento, Angus Young había adoptado su característico traje de escenario de uniforme escolar. La idea era de su hermana Margaret. Angus había probado otros trajes: Spider-Man, Zorro,un gorila, y una parodia de Superman,llamado Super-Ang. [18] En sus primeros días, la mayoría de los miembros de la banda se vistieron con algún tipo de atuendo glam o satinista. 
            En el escenario, Evans fue reemplazado ocasionalmente por el primer mánagerde la banda, Dennis Laughlin, quien fue el cantante original con Sherbet. En el libro ac/dc: Two Sides To Every Glory de Paul Stenningse declaró que Evans no se llevaba bien con Laughlin, lo que también contribuyó al amargo sentimiento de la banda hacia Evans.
            El logotipo de la banda fue diseñado en 1977 por Gerard Huerta. Apareció por primera vez en la versión internacional de Let There Be Rock.
            Malcolm y Angus Young desarrollaron la idea para el nombre de la banda después de que su hermana, Margaret Young, viera las iniciales "AC/DC" en una máquina de coser.
            "AC/DC" es una abreviatura que significa "corriente alterna/corriente directa" electricidad. Los hermanos sentían que este nombre simbolizaba la energía cruda de la banda, las actuaciones impulsadas por el poder de su música. [20][21] "AC/DC" se pronuncia una carta a la vez, aunque la banda se conoce coloquialmente como "Acca Dacca" en Australia. [22][23] El nombre de la banda AC/DC está estilizado con un letrero de alto voltaje que separa el "AC" y "DC" y se ha utilizado en todos los álbumes de estudio, con la excepción de la versión internacional de Dirty Deeds Done Dirt Cheap. 
            A mediados de 1974, la banda había construido una fuerte reputación en vivo, lo que llevó a una ranura de apoyo para el visitante Lou Reed. En algún momento de 1974, por recomendación de Michael Chugg,el veterano promotor de Melbourne Michael Browning reservó la banda para tocar en su club, el Hard Rock. No estaba satisfecho con su imagen glam rock y sentía que Evans era el cantante equivocado para la banda, pero quedó impresionado por la guitarra de los hermanos Young tocando. Poco después, recibió una llamada de la banda; Laughlin había renunciado como gerente, y estaban atrapados en Adelaida sin dinero. Browning accedió a rescatarlos y los reservó para otro concierto en el Hard Rock. Después del concierto, acordaron asumirlo como su nuevo mánager, con la cooperación de su hermano mayor George y Harry Vanda. [25] Los hermanos Young decidieron abandonar la imagen glam rock que ya había sido adoptada por la banda de Melbourne Skyhooks y perseguir un sonido blues-rock más duro. Con este fin, estuvieron de acuerdo en que Evans no era un líder adecuado para el grupo. [19] Alrededor de este tiempo, también trasladaron su base a Melbourne, donde frecuentemente tocaban en el Hard Rock.'
        ));


        $img = file_get_contents("https://4.bp.blogspot.com/-6RkLAy2xbQw/U2ullU4-W8I/AAAAAAAAIYU/OrkPD8SZ-L8/s1600/metallica_logo_wallpaper.jpg");
        Banda::create(array(
            'nombre'=>'Metallica',
            'descripcion' => 'Metallica es una banda estadounidense de heavy metal. La banda se formó en 1981 en Los Ángeles por el vocalista / guitarrista James Hetfield y el baterista Lars Ulrich, y ha estado radicada en San Francisco durante la mayor parte de su carrera. Los tempos rápidos, instrumentales y musicalidad agresiva de la banda los convirtieron en una de las "cuatro grandes" bandas fundadoras de thrash metal, junto a Megadeth, Anthrax y Slayer. La formación actual de Metallica comprende a los miembros fundadores y compositores principales Hetfield y Ulrich, el guitarrista principal Kirk Hammett y el bajista Robert Trujillo. El guitarrista Dave Mustaine (que pasó a formar Megadeth después de ser despedido de la banda) y los bajistas Ron McGovney, Cliff Burton (que murió en un accidente de autobús en Suecia en 1986) y Jason Newsted son ex miembros de la banda.',
            'integrantes'=>'Lars Ulrich, James Hetfield, Kirk Hammett y Robert Trujillo.',
            'genero_id' => Genero::where('nombre', 'Rock')->first()->id,
            'imagen' => base64_encode($img),      
            'origen' => 'Los Angeles, California, U.S.',
            'historia' => 'Metallica se formó en Los Ángeles a fines de 1981 cuando el baterista danés Lars Ulrich colocó un anuncio en un periódico de Los Ángeles, The Recycler, que decía: "Baterista en busca de otros músicos de metal para tocar con Tygers de Pan Tang, Diamond Head y Iron Maiden. "Los guitarristas James Hetfield y Hugh Tanner de Leather Charm respondieron al anuncio. Aunque no había formado una banda, Ulrich le preguntó al fundador de Metal Blade Records, Brian Slagel, si podía grabar una canción para el próximo álbum recopilatorio del sello, Metal Massacre. Slagel aceptó y Ulrich reclutó a Hetfield para cantar y tocar la guitarra rítmica. La banda se formó oficialmente el 28 de octubre de 1981, cinco meses después de que Ulrich y Hetfield se conocieran por primera vez.'
        ));


        $img = file_get_contents("https://upload.wikimedia.org/wikipedia/commons/e/ed/Jack_%C3%9C_Logo1.png");
        Banda::create(array(
            'nombre'=>'Jack U',
            'descripcion' => 'Jack Ü era un dúo de DJ estadounidense formado por los productores de música electrónica Skrillex y Diplo, formado en 2013. Lanzaron su primer sencillo oficial, "Take Ü There", con la voz de Kiesza, el 17 de septiembre de 2014. El 3 de febrero de 2015, el dúo anunció que trabajarían con Missy Elliott en un remix de "Take Ü There". Lanzaron su primer y único álbum, Skrillex y Diplo Present Jack Ü, el 27 de febrero de 2015.',
            'integrantes'=>'Skrillex and Diplo.',
            'genero_id' => Genero::where('nombre', 'Electronica')->first()->id,
            'imagen' => base64_encode($img),      
            'origen' => 'Los Angeles, California, U.S.',
            'historia' => '
            El 15 de septiembre de 2013, la actuación debut de Jack Ü tuvo lugar en Mad Decent Block Party en San Diego con 3 pistas originales: una pista híbrida dubstep-juke conocida como "Shark Patrol", "Bounce it" y una versión muy temprana de su colaboración con AlunaGeorge que luego se lanzaría como "To Ü"
            
            Diplo anunció el proyecto lanzando la alineación de Mad Decent Block Party con Jack Ü tocando en múltiples paradas en la gira. Después de que muchos adivinaran quién era Jack Ü, Diplo finalmente salió para revelar que "Jack Ü ... significa Skrillex y Diplo juntos".'
        ));


        $img = file_get_contents("https://upload.wikimedia.org/wikipedia/commons/9/99/Maroon_5_%28Logo%29.png");
        Banda::create(array(
            'nombre'=>'Maroon 5',
            'descripcion' => 'Maroon 5 es una banda estadounidense de pop rock de Los Ángeles, California. Actualmente está formado por el vocalista Adam Levine,el tecladista y guitarrista Jesse Carmichael,el guitarrista James Valentine,el baterista Matt Flynn,el teclista PJ Morton y el multiinstrumentista Sam Farrar. Los miembros originales Levine, Carmichael, el bajista Mickey Maddeny el baterista Ryan Dusick se unieron por primera vez como Karas Flowers en 1994, mientras todavía estaban en la escuela secundaria.',
            'integrantes'=>'Adam Levine, Jesse Carmichael, James Valentine, Matt Flynn, PJ Morton, Sam Farrar.',
            'genero_id' => Genero::where('nombre', 'Pop')->first()->id,
            'imagen' => base64_encode($img),      
            'origen' => 'Los Ángeles, California,Estados Unidos.',
            'historia' => 'Adam Levine fue presentado a Ryan Dusick por un amigo y guitarrista en común, Adam Salzman. Levine tenía 15 años y Dusick 16.Tres de los cinco miembros de la banda comenzaron a tocar juntos a los 12 años. Los cuatro miembros originales de la banda se conocieron mientras asistían a la Escuela Brentwood en Los Ángeles. Mientras asistían a brentwood School, Adam Levine y Jesse Carmichael se unieron con Mickey Madden y Ryan Dusick para formar Karas Flowers, una banda de rock. El nombre fue tomado de una chica que fue a su escuela secundaria que la banda tenía un "enamoramiento colectivo". Mientras estaban tocando una fiesta en la playa en Malibú, el productor independiente Tommy Allen los escuchó tocar y se ofreció a administrarlos y grabar un disco completo con su compañero, el compositor John DeNicola, quien es conocido por su trabajo en Dirty Dancing (1987) - incluyendo "(He tenido) el momento de mi vida"..'
        ));


    }
}
