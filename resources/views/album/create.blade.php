

@extends('layouts.app')
@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Formulario de album</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <form action="{{route('albumes-store')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de album</label>
                    <div class="col-sm-10">
                        <input type="text"  name="nombre" class="form-control" id="Nombre de album" placeholder="Nombre de album" value="{{old('nombre')}}" >
                        @error('nombre')
                            <label class="col-form-label col-sm-10">{{$message}}</label>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                    <input type="text"  name="fecha" class="form-control" id="fecha"  placeholder="fecha(Año)" value="{{old('fecha')}}">
                    @error('fecha')
                        <label class="col-form-label col-sm-10">{{$message}}</label>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Duracion</label>
                    <div class="col-sm-10">
                    <!--<input type="text"  name="duracion"  class="form-control" id="duracion"  placeholder="Horas:Minutos:Segundos" value="{{old('duracion')}}">-->
                    <input type="time" name="duracion"  step="1" id="duracionn" value="{{old('duracion')}}" >
                    @error('duracion')
                        <label class="col-form-label col-sm-10">{{$message}}</label>
                    @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Seleccione una banda</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="banda_id" value="{{old('banda_id')}}">
                                <option disabled selected>Bandas</option>
                                @foreach($bandas as $banda) <!--Foreach para mostrar las bandas-->
                                    <option value="{{$banda->id}}" {{old('banda_id') == $banda->id ? "selected" : ""}}>{{$banda->nombre}}</option>
                                @endforeach
                            </select>
                            @error('banda_id')
                                <label class="col-form-label col-sm-10">{{$message}}</label>
                            @enderror
                        </div>
                </div>
            
                <div class="file-drop-area"> <span class="choose-file-button">Elegir imagen</span> <span class="file-message">O suelta la imagen aqui</span> <input type="file" name= 'imagen' class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple> </div>
                <div id="divImageMediaPreview"> </div>
                @error('imagen')
                    <label class="col-form-label col-sm-10">{{$message}}</label>
                @enderror

                <br>
                <button class="btn btn-secondary">Crear album</button>
            </form>
        </div>
    </div>
</div>

@endsection