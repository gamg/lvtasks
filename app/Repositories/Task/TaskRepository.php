<?php

namespace Taskapp\Repositories\Task;

use Taskapp\Models\Task;
use Taskapp\Models\User;
use Taskapp\Repositories\BaseRepository;

class TaskRepository extends BaseRepository
{
    protected $filters = ['task', 'task_category'];
    protected $columns = [
        'task' => ['column' => 'description', 'like' => true],
        'task_category' => ['column' => 'category_id', 'like' => false],
    ];

    public function getModel()
    {
        return new Task();
    }

    public function createUserTask($request)
    {
        $request->user()->tasks()->create($request->all());
    }

    public function setComplete($task, $complete)
    {
        $task->completed = $complete;
        $task->save();
    }
}