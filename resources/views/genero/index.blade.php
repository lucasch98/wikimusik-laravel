
@extends('layouts.app')
@section('contenido')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Generos</b></h2></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de genero&hellip;">
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
                            <th>Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($generos as $genero)
                        <tr>
                                <td>{{$genero->nombre}}</td>
                                <td>
                                    <a href="{{route('generos-show', ['id' => $genero->id])}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                    <a href="{{route('generos-edit', ['id' => $genero->id])}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="{{route('generos-delete', ['id' => $genero->id])}}" onclick="return confirm('¿Desea borrar el genero {{$genero->nombre}}?')"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>                            
                                </td>
                        </tr>   
                        @endforeach
                    </tbody>
                    <a href="{{route('generos-create')}}" type="button" class="btn btn-secondary" method="GET">Crear genero</a>
                </table>
            </div>
        </div>
    </div>   

@endsection