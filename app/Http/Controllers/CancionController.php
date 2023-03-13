<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cancion\CancionCreateRequest;
use App\Http\Requests\Cancion\CancionEditRequest;

use App\Models\Cancion;
use App\Models\Album;
use App\Models\Banda;


class CancionController extends Controller
{
    public function index(){
        $canciones = Cancion::all()->sortBy('id');
        return view('cancion.index')->with('canciones', $canciones);
    }

    public function create(){
        $albumes = Album::all();
        $bandas = Banda::all();
        return view('cancion.create')->with('bandas', $bandas)->with('albumes', $albumes);
    }

    public static function conversorSegundosHoras($tiempo_en_segundos) {
        $horas = floor($tiempo_en_segundos / 3600);
        if($horas < 10){
            $horas = "0".$horas;
         }

        $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
        if($minutos < 10){
           $minutos = "0".$minutos;
        }

        $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
        if($segundos < 10){
            $segundos = "0".$segundos;
         }
    
        return $horas.':'.$minutos.":".$segundos;
    }

    public function store(CancionCreateRequest $request){
            $cancion = new Cancion();
            $cancion->nombre = $request->nombre;
            $cancion->album_id = $request->album_id;
            $jsonApiSpotify = self::spotifyApi($cancion);

            if($jsonApiSpotify != NULL){//Se encontro la cancion en spotify
                if($request->duracion != NULL){
                    $cancion->duracion = $request->duracion;
                }else{
                    $cancion->duracion = self::conversorSegundosHoras(intval(($jsonApiSpotify['tracks']['items'][0]['duration_ms'] / 1000)));//Me traigo la duracion de la Api de Spotify.
                    $cancion->nombre = $jsonApiSpotify['tracks']['items'][0]['name'];//Guardo con el nombre que se encuentra en Spotify.
                }

                if($request->url != NULL){//Verifico que la url ingresada por el usuario sea valida.
                    $request->validate([
                        'url' => 'required|url']);
                        $cancion->url = $request->url;
                } else{
                    $cancion->nombre = $jsonApiSpotify['tracks']['items'][0]['name'];//Guardo con el nombre que se encuentra en Spotify.
                    $cancion->url = $jsonApiSpotify['tracks']['items'][0]['external_urls']['spotify'];//Me traigo la url de la Api de Spotify.
                }
            }else{//No se encontro la cancion en spotify.
                return redirect()->back()->withInput($request->input())->withError('El nombre de la cancion no se encuentra en la API de Spotify.');
            }
                $cancion->save();
                return redirect()->route('canciones')->with('success', 'Se creo con éxito la nueva cancion');
    }

    public static function spotifyApi($cancion){ //Retorna el Json de la Api de Spotify.    
        $client_id = 'dc10c67edd954714b53997b07a33484b'; 
        $client_secret = 'db20ff153bfc467db8d19761fe5da5bb'; 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_POST,           1 );
        curl_setopt($curl, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
        curl_setopt($curl, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

        $response = curl_exec($curl);
        $token = json_decode($response)->access_token;
        $err = curl_error($curl);
        curl_close($curl);

        $nombreCancion = str_replace(' ', '%20', $cancion->nombre);//Reemplazo los espacios por %20.
        $nombreAlbum = str_replace(' ', '%20', $cancion->album->nombre);
        $nombreBanda = str_replace(' ', '%20', $cancion->album->banda->nombre);

        $nombreCancion = $nombreCancion."%20". $nombreAlbum."%20".$nombreBanda."%20";   //$cancion->album->banda->nombre."%20";
    
        if ($err) {
        echo "cURL Error #:" . $err;
        curl_close($curl);
        } else {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.spotify.com/v1/search?q=".$nombreCancion."&type=track&market=US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer ".$token,
            ),
            ));
            $track_info = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($track_info, true);
           if($result['tracks']['total'] == 0){//En caso de que no se encontro la cancion en la API devuelvo NULL.
               return NULL;
           }

          return $result; 
        }
}


    public function show($id){
        $cancion = Cancion::findOrFail($id);
        return view('cancion.show')->with('cancion', $cancion);
    }

    public function edit($id){
        $cancion = Cancion::findOrFail($id);
        $bandas = Banda::all();
        $albumes = Album::all();
      return view('cancion.edit')->with('albumes', $albumes)->with('bandas', $bandas)->with('cancion', $cancion);
      
    }

    public function update(CancionEditRequest $request, $id){
      
            $cancion = Cancion ::findOrFail($id);
            $cancion->nombre = $request->nombre;
            $cancion->duracion = $request->duracion;
            $cancion->album_id = $request->album_id;
           
            if($request->url != NULL){
                $request->validate([
                    'url' => 'required|url']);
            }
            $cancion->url = $request->url;
            $cancion->save();        
            return redirect()->route('canciones')->with('success', 'Se guardaron con éxito los cambios en la cancion');          
    }

    public function destroy($id){

         $cancion = Cancion::findOrFail($id);
         $cancion->delete();
      
        return redirect('canciones')->with('success', 'Se elimino con éxito la cancion');
    }
}

