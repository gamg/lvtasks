<?php

namespace Taskapp\Repositories\Task;

use Taskapp\Models\Task;
use Taskapp\Models\User;
use Taskapp\Repositories\BaseRepository;

class TaskRepository extends BaseRepository
{
    public function getModel()
    {
        return new Task();
    }

    public function userTasks(User $user, $paginate = true, $recordsNumber = 5)
    {
        return ($paginate) ? $user->tasks()->orderBy('created_at', 'desc')->paginate($recordsNumber)
                : $user->tasks()->orderBy('created_at', 'desc')->get();
    }

    public function createUserTask($request)
    {
        $request->user()->tasks()->create($request->all());
    }
}