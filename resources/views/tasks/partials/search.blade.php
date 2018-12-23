@inject('categories', 'Taskapp\Services\Categories')

{!! Form::model(Request::all(),
        [   'route' => 'tasks.index',
            'method' => 'GET',
            'class' => 'form-inline',
            'rol' => 'search'
        ])
!!}
<div class="form-group">
    <a class="btn btn-primary" href="{{route('tasks.index')}}">
        Ver todo
    </a>
</div>

<div class="form-group">
    {!! Form::text('task', null, ['class' => 'form-control', 'placeholder' => 'Busca una tarea']) !!}
</div>

<div class="form-group">
    {!! Form::select('task_category', $categories->get(), null, ['class' => 'form-control']) !!}
</div>

<button type="submit" class="btn btn-primary">
    Buscar
</button>
{!! Form::close() !!}