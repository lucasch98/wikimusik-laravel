

@extends('layouts.app')
@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b> Banda</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de banda</label>              
                <label class="col-form-label col-sm-10">{{$banda->nombre}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Integrantes</label>              
                <label class="col-form-label col-sm-10">{{$banda->integrantes}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Descripcion</label>              
                <label class="col-form-label col-sm-10">{{$banda->descripcion}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Origen</label>              
                <label class="col-form-label col-sm-10">{{$banda->origen}}</label>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Historia</label>              
                <label class="col-form-label col-sm-10">{{$banda->historia}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Genero</label>              
                <label class="col-form-label col-sm-10">{{$banda->genero->nombre}}</label>
            </div>

            <div class="form-group col-4">
                <img class="object-scale-down" src="data:image/jpeg;base64,{{ $banda->imagen }}" alt="Imagen de {{ $banda->nombre }}">
            </div>
        </div>
    </div>
</div>


@endsection
