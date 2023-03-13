
@extends('layouts.app')
@section('contenido')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Albumes</b></h2></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de album&hellip;">
                            </div>
                        </div>
                    </div>
                </div>         
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>Nombre </th>
                            <th>Fecha </th>
                            <th>Duracion </th>
                            <th>Banda </th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach($albumes as $album)
                        <tr>
                                <td>{{$album->nombre}}</td>
                                <td>{{$album->fecha}}</td>
                                <td>{{$album->duracion}}</td>
                                <td>{{$album->banda->nombre}}</td>
                                <td>
                                    <a href="{{route('albumes-show', ['id' => $album->id])}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                    <a href="{{route('albumes-edit', ['id' => $album->id])}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="{{route('albumes-delete', ['id' => $album->id])}}" onclick="return confirm('¿Desea borrar el album {{$album->nombre}}?')"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                
                                </td>
                        </tr>   
                        @endforeach
                    </tbody>

                    <a href="{{route('albumes-create')}}" type="button" class="btn btn-secondary" method="GET">Crear album</a>
                </table>
            </div>
        </div>
    </div>  
    
@endsection