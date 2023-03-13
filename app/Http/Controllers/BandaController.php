<?php

namespace App\Http\Controllers;


use App\Models\Banda;
use App\Models\Genero;

use App\Http\Requests\Banda\BandaCreateRequest;
use App\Http\Requests\Banda\BandaEditRequest;
use Exception;

class BandaController extends Controller
{
    public function index(){        
        $bandas = Banda::all()->sortBy('id');
        return view('banda.index')->with('bandas', $bandas);    
    }

    public function create(){
        $genero = Genero::all();
        return view('banda.create')->with('generos', $genero);
    } 

    public function store(BandaCreateRequest $request){

        $banda = new Banda();
        $banda->nombre = $request->nombre;
        $banda->integrantes = $request->integrantes;
        $banda->descripcion = $request->descripcion;
        $banda->genero_id = $request->genero_id;
        $banda->origen= $request->origen;
        $banda->historia=$request->historia;

        $imagen = base64_encode(file_get_contents($request->file('imagen')));
        $banda->imagen = $imagen;


        $banda->save();

        return redirect()->route('bandas')->with('success', 'Se creo con éxito la nueva banda');
    }

    public function show($id)
    {
        $banda = Banda::findOrFail($id);
        $banda->imagen = stream_get_contents($banda->imagen);
        return view('banda.show')->with('banda', $banda);

    }
        
    public function edit($id){
        $banda = Banda::findOrFail($id);
        $generos = Genero::all();
      return view('banda.edit')->with('banda', $banda)->with('generos', $generos);  
    }

    public function update(BandaEditRequest $request, $id){
       try{
        $banda = Banda ::findOrFail($id);

        $banda->nombre = $request->nombre;
        $banda->integrantes = $request->integrantes;
        $banda->descripcion = $request->descripcion;
        $banda->genero_id = $request->genero_id;
        $banda->origen= $request->origen;
        $banda->historia=$request->historia;

        if($request->file('imagen')){
            $request->validate([
                'imagen' => ['image', 'required','mimes:jpeg,jpg,png', 'max:10240']
                ]);
            $imagen = base64_encode(file_get_contents($request->file('imagen')));
            $banda->imagen = $imagen;
        }

        $banda->save();  
    
        return redirect()->route('bandas')->with('success', 'Se guardaron con éxito los cambios en la banda');
        }catch(Exception $ex){

            return redirect()->back()->with('error', 'Algo salio mal');
        }
    }

    public function destroy($id){
        $banda = Banda::findOrFail($id);
        $banda->delete();
        
       return redirect('bandas')->with('success', 'Se elimino con éxito la banda');
    }
    
}
