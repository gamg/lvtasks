<?php

namespace Taskapp\Repositories\Category;

use Taskapp\Models\Category;
use Taskapp\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function getModel()
    {
        return new Category();
    }
}