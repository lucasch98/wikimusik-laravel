

@extends('layouts.app')
@section('contenido')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Formulario de banda</b></h2></div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
                
                <form action="{{route('bandas-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de banda</label>
                        <div class="col-sm-10">
                            <input type="text"  name="nombre" class="form-control" id="Nombre de banda" placeholder="Nombre de banda" value="{{old('nombre')}}" >
                            @error('nombre')
                                <label class="col-form-label col-sm-10">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Integrantes</label>
                        <div class="col-sm-10">
                        <input type="text"  name="integrantes" class="form-control" id="Integrantes"  placeholder="Integrantes" value="{{old('integrantes')}}">
                        @error('integrantes')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                        <textarea type="text"  name="descripcion" class="form-control" id="Descripcion"  rows="10" placeholder="Descripcion">{{old('descripcion')}}</textarea>
                        @error('descripcion')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione un genero</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="genero_id" value="{{old('genero_id')}}">
                                    <option disabled selected>Generos</option>
                                    @foreach($generos as $genero) <!--Foreach para mostrar los generos-->
                                        <option value="{{$genero->id}}" {{old('genero_id') == $genero->id ? "selected" : ""}}>{{$genero->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('genero_id')
                                    <label class="col-form-label col-sm-10">{{$message}}</label>
                                @enderror
                            </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Origen</label>
                        <div class="col-sm-10">  
                        <input type="text"  name="origen" class="form-control" id="Origen"  placeholder="Origen" value="{{old('origen')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Historia</label>
                        <div class="col-sm-10">
                        <input type="text"  name="historia" class="form-control" id="Historia"  placeholder="Historia" value="{{old('historia')}}">
                        </div>
                    </div>
                    
                    <div class="file-drop-area"> <span class="choose-file-button">Elegir imagen</span> <span class="file-message">O suelta la imagen aqui</span> <input type="file" name= 'imagen' class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple> </div>
                    <div id="divImageMediaPreview"> </div>
                    @error('imagen')
                        <label class="col-form-label col-sm-10">{{$message}}</label>
                    @enderror

                    <br>
                    <button class="btn btn-secondary">Crear banda</button>
                </form>
            </div>
        </div>
    </div>

@endsection