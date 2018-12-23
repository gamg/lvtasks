<?php

namespace Taskapp\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Taskapp\Http\Controllers\Controller;
use Taskapp\Http\Requests\Task\CreateEditRequest;
use Taskapp\Models\Task;
use Taskapp\Repositories\Task\TaskRepository;
use Illuminate\Support\Facades\Gate;

class TasksController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getIndex(Request $request)
    {
        $tasks = $this->taskRepository->search($request->user(), $request->all());
        return view('tasks.tasks')->with('tasks', $tasks);
    }

    public function getCreate()
    {
        return view('tasks.create');
    }

    public function postStore(CreateEditRequest $request)
    {
        $this->taskRepository->createUserTask($request);
        session()->flash('message', [
            'alert' => 'success',
            'text' => trans('messages.created')
        ]);
        return redirect()->route('tasks.index');
    }

    public function getEdit(Task $task)
    {
        if (is_null($task)) return redirect()->route('tasks.index');

        if (Gate::denies('check-task', $task)) {
            return redirect('tasks');
        }

        $data = [
            'route'  =>  route('tasks.update', $task->id),
            'title'  =>  'Editando tarea',
            'button' =>  'Actualizar'
        ];

        return view('tasks.create')->with('data', $data)->with('task', $task);
    }

    public function putUpdate(CreateEditRequest $request, Task $task)
    {
        if (Gate::denies('check-task', $task)) {
            return redirect('tasks');
        }

        if (is_null($task)) return redirect()->route('tasks.index');

        $this->taskRepository->update($task, $request->all());

        session()->flash('message', [
            'alert' => 'success',
            'text' => '¡Bien! Tarea editada correctamente.'
        ]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if (is_null($task)) return redirect()->route('tasks.index');

        if (Gate::denies('check-task', $task)) {
            return redirect('tasks');
        }

        $this->taskRepository->delete($task);

        session()->flash('message', [
            'alert' => 'info',
            'text' => 'Tarea eliminada correctamente. =('
        ]);

        return redirect()->route('tasks.index');
    }

    public function postComplete(Request $request, $id)
    {
        if ($request->ajax()) {
            $task = $this->taskRepository->find($id);
            if (!is_null($task)) {
                $this->taskRepository->setComplete($task, $request->complete);
                return response()->json([
                    'response' => true,
                    'message' => 'Tarea completada!',
                    'type' => $request->complete
                ]);
            }
            return response()->json([
                'response' => false,
                'message' => 'Ha ocurrido un error, intente de nuevo.',
            ]);
        }
    }
}
