@extends('layouts.app')
@section('contenido')


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Editar cancion</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <form action="{{route('canciones-update', ['id' => $cancion->id])}}" method="POST" enctype="multipart/form-data">
            
                @csrf
                @method('PATCH')
                
                <div class="form-group row">
                    <label for="Nombre de cancion" class="col-sm-2 col-form-label">Nombre de cancion</label>
                    <div class="col-sm-10">                
                    <input type="text"  name="nombre" autocomplete="off" class="form-control" id="Nombre de cancion" value="{{old('nombre', $cancion->nombre)}}">
                    @error('nombre')
                        <label class="col-form-label col-sm-10">{{$message}}</label>
                    @enderror
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Duracion</label>
                    <div class="col-sm-10">
                        <input type="text"  name="duracion" class="form-control" id="duracion" placeholder="Minutos:Segundos" value="{{old('duracion', $cancion->duracion)}}" >
                        @error('duracion')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Album</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="album_id" >
                                <option disabled selected>Album</option>
                                @foreach($albumes as $album) <!--Foreach para mostrar los albumes-->
                                    <option value="{{$album->id}}" {{($cancion->album->id ===$album->id) ? 'Selected' : ''}}>{{$album->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                <div class="form-group row">
                    <label for="Nombre de cancion" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-10">                
                    <input type="text"  name="url" autocomplete="off" class="form-control" id="Nombre de cancion" value="{{old('url', $cancion->url)}}">
                    @error('url')
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