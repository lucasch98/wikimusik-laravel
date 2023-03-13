<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Cancion\CancionCreateRequest;
use App\Http\Requests\Cancion\CancionEditRequest;

use App\Models\Cancion;
use App\Models\Album;
use App\Models\Banda;
use Exception;

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

    public function store(CancionCreateRequest $request){

        $cancion = new Cancion();
        $cancion->nombre = $request->nombre;
        $cancion->album_id = $request->album_id;
        $cancion->duracion = $request->duracion;

        if($request->url != NULL){
            $request->validate([
                'url' => 'required|url']);
                $cancion->url = $request->url;
        }
        
        $cancion->save();

        return redirect()->route('canciones')->with('success', 'Se creo con éxito la nueva cancion');
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

