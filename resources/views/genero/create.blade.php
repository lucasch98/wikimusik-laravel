

@extends('layouts.app')
@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b> Formulario de genero</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <form action="{{route('generos-store')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de genero</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nombre" class="form-control" id="Nombre de genero" placeholder="Nombre de genero" value="{{old('nombre')}}" >
                        @error('nombre')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                    </div>
                </div>
                
                <br>
                <button class="btn btn-secondary">Crear genero</button>
            </form>
        </div>
    </div>
</div>

@endsection