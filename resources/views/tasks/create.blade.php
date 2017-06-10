@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{(isset($data)) ? $data['title'] : 'Crear Nueva Tarea'}}</h3>
                </div>
                <div class="panel-body">
                    @include('partials.errors')
                    <form action="{{(isset($data)) ? $data['route'] : route('tasks.store')}}"
                          method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="control-label">Tarea</label>
                            @if(isset($task))
                                <input type="text" name="name" class="form-control"
                                       value="{{(!empty(old('name'))) ? old('name') : $task->name }}" required>
                            @else
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name') }}" required>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{(isset($data)) ? $data['button'] : 'Agregar'}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection