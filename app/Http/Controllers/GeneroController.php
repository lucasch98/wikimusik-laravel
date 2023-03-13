<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

use App\Http\Requests\Genero\GeneroCreateRequest;
use App\Http\Requests\Genero\GeneroEditRequest;
use App\Models\Album;
use App\Models\Banda;
use App\Models\Cancion;
use Exception;

class GeneroController extends Controller
{
    public function index(){
        $generos = Genero::all()->sortBy('id');
        return view('genero.index')->with('generos', $generos);
    }

    public function edit($id){
        $genero = Genero::findOrFail($id);
      return view('genero.edit')->with('genero', $genero);
    }

    public function create(){
        return view('genero.create');
    }

    public function show($id){
        $genero = Genero::findOrFail($id);
        return view('genero.show')->with('genero', $genero);
    }

    public function store(GeneroCreateRequest $request){
        $genero = new Genero();
        $genero->nombre = $request->nombre;
        $genero->save();

        return redirect()->route('generos')->with('success', 'Se creo con éxito el nuevo genero');
    }

    public function update(GeneroEditRequest $request, $id){
        try{
            $genero = Genero::findOrFail($id);
            $genero->nombre = $request->nombre;

            $genero->save();
        
        return redirect()->route('generos')->with('success', 'Se guardaron con éxito los cambios en el genero');
        }catch(Exception $ex){
            return redirect()->back()->with('error', 'Algo salio mal');
        }
    }

    public function destroy($id){

          $genero = Genero::findOrFail($id);
          $genero->delete();

         return redirect('generos')->with('success', 'Se elimino con éxito el genero');
     }

}
