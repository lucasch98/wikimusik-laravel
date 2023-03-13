@extends('layouts.app')
@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Editar genero</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <form action="{{route('generos-update', ['id' => $genero->id])}}" method="POST" enctype="multipart/form-data">
            
                    @csrf
                    @method('PATCH')
                
                    <div class="form-group row">
                        <label for="Nombre de cancion" class="col-sm-2 col-form-label">Nombre de genero</label>
                        <div class="col-sm-10">                
                        <input type="text"  name="nombre" autocomplete="off" class="form-control" id="Nombre de genero" value="{{old('nombre', $genero->nombre)}}">
                        @error('nombre')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                        </div>
                    </div>
                <br>
                <button class="btn btn-secondary">Guardar cambios</button>
            </form>
        </div>    
    </div>
</div>
@endsection