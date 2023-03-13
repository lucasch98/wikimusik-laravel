
@extends('layouts.app')

@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Cancion</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de cancion</label>              
                <label class="col-form-label col-sm-10">{{$cancion->nombre}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de banda</label>              
                <label class="col-form-label col-sm-10">{{$cancion->album->banda->nombre}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de album</label>              
                <label class="col-form-label col-sm-10">{{$cancion->album->nombre}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Duracion</label>              
                <label class="col-form-label col-sm-10">{{$cancion->duracion}}</label>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Url</label>              
                <label class="col-form-label col-sm-10"> 
                        @if($cancion->url == NULL)
                            "No tiene url"
                        @endif    
                {{$cancion->url}}</label>
            </div>          
        </div>
    </div>
</div>

@endsection
