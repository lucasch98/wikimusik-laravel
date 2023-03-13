
@extends('layouts.app')
@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Album</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de album</label>              
                <label class="col-form-label col-sm-10">{{$album->nombre}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fecha</label>              
                <label class="col-form-label col-sm-10">{{$album->fecha}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Duracion</label>              
                <label class="col-form-label col-sm-10">{{$album->duracion}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Banda</label>              
                <label class="col-form-label col-sm-10">{{$album->banda->nombre}}</label>
            </div>

            <div class="form-group col-3">
                <img class="object-scale-down" src="data:image/jpeg;base64,{{ $album->imagen }}" alt="Imagen de {{ $album->nombre }}">
            </div>
        </div>
    </div>
</div>

@endsection
