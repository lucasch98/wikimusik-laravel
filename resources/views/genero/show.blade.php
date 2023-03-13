
@extends('layouts.app')
@section('contenido')

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Genero</b></h2></div>
                    <div class="col-sm-4"></div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre de genero</label>              
                <label class="col-form-label col-sm-10">{{$genero->nombre}}</label>
            </div>
        </div>
    </div>
</div>

@endsection
