<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Album\AlbumCreateRequest;
use App\Http\Requests\Album\AlbumEditRequest;


use App\Models\Album;
use App\Models\Banda;
use App\Models\Cancion;

use Exception;

class AlbumController extends Controller
{
        public function index(){        
            $Albumes = Album::all()->sortBy('id');
           return view('album.index')->with('albumes', $Albumes);    
        }
    
        public function create(){
            $banda = Banda::all();
            return view('album.create')->with('bandas', $banda);
        } 
    
        public function store(AlbumCreateRequest $request){
    
            $album = new Album();
            $album->nombre = $request->nombre;
            $album->fecha = $request->fecha;
            $album->duracion = $request->duracion;
            $album->banda_id = $request->banda_id;

            $imagen = base64_encode(file_get_contents($request->file('imagen')));
            $album->imagen = $imagen;

            $album->save();
            return redirect()->route('albumes')->with('success', 'Se creo con éxito el nuevo album');
        }
    
        public function show($id)
        {
            $album = Album::findOrFail($id);
            $album->imagen = stream_get_contents($album->imagen);
            return view('album.show')->with('album', $album);
        }
            
        public function edit($id){
            $album = Album::findOrFail($id);
            $bandas = Banda::all();
          return view('album.edit')->with('album', $album)->with('bandas', $bandas);
        }
    
        public function update(AlbumEditRequest $request, $id){
            try{
                $album = Album ::findOrFail($id);
        
                $album->nombre = $request->nombre;
                $album->fecha = $request->fecha;
                $album->duracion = $request->duracion;
                $album->banda_id = $request->banda_id;

                if($request->file('imagen')){
                    $request->validate([
                        'imagen' => ['image', 'required','mimes:jpeg,jpg,png', 'max:10240']
                        ]);
                    $imagen = base64_encode(file_get_contents($request->file('imagen')));
                    $album->imagen = $imagen;                  
                }
                
                $album->save();  
            
                return redirect()->route('albumes')->with('success', 'Se guardaron con éxito los cambios en el album');
                }catch(Exception $ex){
                    return redirect()->back()->with('error', 'Algo salio mal');
                }
        }
    
        public function destroy($id){
            $album = Album::findOrFail($id);
            $album->delete();
            
            return redirect('albumes')->with('success', 'Se elimino con éxito el album');
        }

}

