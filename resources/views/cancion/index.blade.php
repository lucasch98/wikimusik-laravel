
@extends('layouts.app')
@section('contenido')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Canciones</b></h2></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de cancion&hellip;">
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
                            <th>Banda </th>
                            <th>Album </th>
                            <th>Duracion </th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                
                    <tbody>
                    @foreach($canciones as $cancion)
                    <tr>
                            <td>{{$cancion->nombre}}</td>
                            <td>{{$cancion->album->banda->nombre}}</td>
                            <td>{{$cancion->album->nombre}}</td>
                            <td>{{$cancion->duracion}}</td>
                            <td>
                                <a href="{{route('canciones-show', ['id' => $cancion->id])}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="{{route('canciones-edit', ['id' => $cancion->id])}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="{{route('canciones-delete', ['id' => $cancion->id])}}" onclick="return confirm('¿Desea borrar la cancion {{$cancion->nombre}}?')"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>                            
                                @if ($cancion->url != null)<!-- Si la url de la cancion no es nula muestro el icono de spotify-->              
                                        <a href="{{$cancion->url}}" class="fa fa-spotify" target="_blank" style="color:#81b71a"></a>               
                                @endif
                                
                            </td>
                    </tr>   
                    @endforeach
                    </tbody>

                    <a href="{{route('canciones-create')}}" type="button" class="btn btn-secondary" method="GET">Crear cancion</a>
                 </table>
            </div>
        </div>
    </div>  

@endsection