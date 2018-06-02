<?php

namespace Taskapp\Repositories\Category;

use Taskapp\Models\User;
use Taskapp\Models\Category;
use Taskapp\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function getModel()
    {
        return new Category();
    }

    public function userCategories(User $user, $paginate = true, $recordsNumber = 5)
    {
        return ($paginate) ? $user->categories()->orderBy('created_at', 'desc')->paginate($recordsNumber)
            : $user->categories()->orderBy('created_at', 'desc')->get();
    }

    public function createUserCategory($request)
    {
        $request->user()->categories()->create($request->all());
    }
}