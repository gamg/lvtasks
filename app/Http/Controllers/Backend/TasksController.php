<?php

namespace Taskapp\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Taskapp\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function getIndex(Request $request)
    {
        $tasks = $request->user()->tasks()->get();
        return view('tasks.tasks')->with('tasks', $tasks);
    }
}
