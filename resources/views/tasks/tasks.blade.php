@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Mis Tareas</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Completada</th>
                            <th>Tarea</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>...</td>
                                    <td>{{$task->name}}</td>
                                    <td>...</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection