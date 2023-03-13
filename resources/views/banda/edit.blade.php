
@extends('layouts.app')
@section('contenido')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b> Editar banda</b></h2></div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
                
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                <form action="{{route('bandas-update', ['id' => $banda->id])}}" method="POST" enctype="multipart/form-data">
                
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group row">
                        <label for="Nombre de banda" class="col-sm-2 col-form-label">Nombre de banda</label>
                        <div class="col-sm-10">                
                        <input type="text"  name="nombre" class="form-control" id="Nombre de banda" value="{{old('nombre', $banda->nombre)}}">
                        @error('nombre')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Integrantes" class="col-sm-2 col-form-label">Integrantes</label>
                        <div class="col-sm-10">
                        <input type="text"  name="integrantes" class="form-control" id="Integrantes" value="{{old('integrantes', $banda->integrantes)}}">
                        @error('integrantes')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                        <textarea type="text"  name="descripcion" class="form-control" id="Descripcion" rows="10">{{old('descripcion', $banda->descripcion)}}</textarea>
                        @error('descripcion')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione un genero</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="genero_id" >
                                <option disabled selected>Generos</option>
                                @foreach($generos as $genero) <!--Foreach para mostrar los generos-->
                                <option value="{{$genero->id}}" {{old('genero_id', $banda->genero_id) == $genero->id ? "Selected" : ""}}>{{$genero->nombre}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Origen" class="col-sm-2 col-form-label">Origen</label>
                        <div class="col-sm-10">
                        <input type="text"  name="origen" class="form-control" id="Origen" value="{{old('origen', $banda->origen)}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Historia" class="col-sm-2 col-form-label">Historia</label>
                        <div class="col-sm-10">
                        <input type="text"  name="historia" class="form-control" id="Historia" value="{{old('historia', $banda->historia)}}">
                        </div>
                    </div>
                    
                    <div class="file-drop-area"> <span class="choose-file-button">Elegir imagen</span> <span class="file-message">O suelta la imagen aqui</span> <input type="file" name= 'imagen' class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple> </div>
                        <div id="divImageMediaPreview"> </div>

                        @error('imagen')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror

                    <br>
                    <td>
                        <button class="btn btn-secondary">Guardar cambios</button>
                    </td>
                </form>
            </div>
        </div>
    </div>

@endsection