

@extends('layouts.app')
@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Formulario de cancion</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <form action="{{route('canciones-store')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de cancion</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nombre" class="form-control" id="Nombre de cancion" placeholder="Nombre de cancion" value="{{old('nombre')}}" >
                        @error('nombre')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione un album</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="album_id" value="{{old('album_id')}}">
                                <option disabled selected>Albumes</option>
                                @foreach($albumes as $album) <!--Foreach para mostrar los generos-->
                                    <option value="{{$album->id}}">{{$album->nombre}}</option>
                                @endforeach
                            </select>
                            @error('album_id')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror

                        </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Duracion</label>
                    <div class="col-sm-10">
                        <input type="text"  name="duracion" class="form-control" id="duracion" placeholder="Horas:Minutos:Segundos" value="{{old('duracion')}}" >
                        @error('duracion')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">
                        <input type="text"  name="url" class="form-control" id="url" placeholder="url" value="{{old('url')}}" >
                        @error('url')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                    </div>
                </div>
                
                <br>
                <button class="btn btn-secondary">Crear cancion</button>
            </form>
        </div>
    </div>
</div>

@endsection