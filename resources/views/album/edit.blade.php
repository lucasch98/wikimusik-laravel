@extends('layouts.app')
@section('contenido')


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Editar album</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            @if(Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
                
            <form action="{{route('albumes-update', ['id' => $album->id])}}" method="POST" enctype="multipart/form-data">
                
                @csrf
                @method('PATCH')
                
                <div class="form-group row">
                    <label for="Nombre de album" class="col-sm-2 col-form-label">Nombre de album</label>
                    <div class="col-sm-10">                
                    <input type="text"  name="nombre" class="form-control" id="Nombre de album" value="{{old('nombre', $album->nombre)}}">
                    @error('nombre')
                        <label class="col-form-label col-sm-10">{{$message}}</label>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                    <input type="text"  name="fecha" class="form-control" id="fecha" value="{{old('fecha', $album->fecha)}}">
                    @error('fecha')
                        <label class="col-form-label col-sm-10">{{$message}}</label>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Duracion" class="col-sm-2 col-form-label">Duracion</label>
                    <div class="col-sm-10">
                    <input type="text"  name="duracion" class="form-control" id="duracion" value="{{old('duracion', $album->duracion)}}">
                    @error('duracion')
                        <label class="col-form-label col-sm-10">{{$message}}</label>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione una banda</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="banda_id" >
                            <option disabled selected>Bandas</option>
                            @foreach($bandas as $banda) <!--Foreach para mostrar las bandas-->
                            <option value="{{$banda->id}}" {{($album->banda->id ===$banda->id) ? 'Selected' : ''}}>{{$banda->nombre}}</option>
                            @endforeach
                        </select>
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