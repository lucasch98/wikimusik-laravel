
@extends('layouts.app')
@section('contenido')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2><b>Bandas</b></h2></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Nombre de banda&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
          
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
               
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>Nombre </th>
                            <th>Integrantes </th>
                            <th>Genero </th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                
                    <tbody>
                    @foreach($bandas as $banda)
                    <tr>
                            <td>{{$banda->nombre}}</td>
                            <td>{{$banda->integrantes}}</td>
                            <td>{{$banda->genero->nombre}}</td>
                            <td>
                                <a href="{{route('bandas-show', ['id' => $banda->id])}}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="{{route('bandas-edit', ['id' => $banda->id])}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="{{route('bandas-delete', ['id' => $banda->id])}}" onclick="return confirm('¿Desea borrar la banda {{$banda->nombre}}?')"  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            
                            </td>
                    </tr>   
                    @endforeach
                    </tbody>
                    <a href="{{route('bandas-create')}}" type="button" class="btn btn-secondary" method="GET">Crear banda</a>
                </form>
                </table>
                <div class="clearfix">
            </div>
        </div>
    </div>  
@endsection