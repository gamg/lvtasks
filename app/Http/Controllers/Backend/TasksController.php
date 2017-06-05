<?php

namespace Taskapp\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Taskapp\Http\Controllers\Controller;
use Taskapp\Http\Requests\Task\CreateEditRequest;

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
}
