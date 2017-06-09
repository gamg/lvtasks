<?php

namespace Taskapp\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Taskapp\Http\Controllers\Controller;
use Taskapp\Http\Requests\Task\CreateEditRequest;
use Taskapp\Models\Task;

class TasksController extends Controller
{
    public function getIndex(Request $request)
    {
        $tasks = $request->user()->tasks()->get();
        return view('tasks.tasks')->with('tasks', $tasks);
    }

    public function getCreate()
    {
        return view('tasks.create');
    }

    public function postStore(CreateEditRequest $request)
    {
        $request->user()->tasks()->create($request->all());
        session()->flash('message', [
            'alert' => 'success',
            'text' => '¡Bien! Tarea guardada correctamente.'
        ]);
        return redirect()->route('tasks.index');
    }

    public function getEdit($id)
    {
        $task = Task::find($id);
        if (is_null($task)) return redirect()->route('tasks.index');

        $data = [
            'route'  =>  route('tasks.update', $task->id),
            'title'  =>  'Editando tarea',
            'button' =>  'Actualizar'
        ];

        return view('tasks.create')->with('data', $data)->with('task', $task);
    }

    public function postUpdate(CreateEditRequest $request, $id)
    {
        $task = Task::find($id);
        if (is_null($task)) return redirect()->route('tasks.index');

        $task->fill($request->all());
        $task->save();

        session()->flash('message', [
            'alert' => 'success',
            'text' => '¡Bien! Tarea editada correctamente.'
        ]);
        return redirect()->route('tasks.index');
    }
}
