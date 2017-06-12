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
            'text' => trans('messages.created')
        ]);
        return redirect()->route('tasks.index');
    }

    public function getEdit(Task $task)
    {
        if (is_null($task)) return redirect()->route('tasks.index');

        $data = [
            'route'  =>  route('tasks.update', $task->id),
            'title'  =>  'Editando tarea',
            'button' =>  'Actualizar'
        ];

        return view('tasks.create')->with('data', $data)->with('task', $task);
    }

    public function putUpdate(CreateEditRequest $request, Task $task)
    {
        if (is_null($task)) return redirect()->route('tasks.index');

        $task->fill($request->all());
        $task->save();

        session()->flash('message', [
            'alert' => 'success',
            'text' => '¡Bien! Tarea editada correctamente.'
        ]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if (is_null($task)) return redirect()->route('tasks.index');

        $task->delete();

        session()->flash('message', [
            'alert' => 'info',
            'text' => 'Tarea eliminada correctamente. =('
        ]);

        return redirect()->route('tasks.index');
    }
}
