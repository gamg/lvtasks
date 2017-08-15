@extends('layouts.app')

@include('partials.modals')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Mis Categorías</h3>
            </div>
            <div class="panel-body">
                <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm">Nueva</a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>Nombre</th>
                            <th>Hechas</th>
                            <th>Pendientes</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>7</td>
                                <td>3</td>
                                <td>
                                    <a href="{{route('categories.show', $category->id)}}" class="btn btn-info">Ver tareas</a>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info action">Editar</a>
                                    <a href="{{route('categories.destroy', $category->id)}}" class="btn btn-danger delete-record">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection