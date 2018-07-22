<?php

namespace Taskapp\Services;

use Taskapp\Repositories\Category\CategoryRepository;
use Illuminate\Support\Facades\Auth;

class Categories
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }
    public function get()
    {
        $categoriesArray[''] = 'Selecciona una Categoría';
        $categories =  $this->categoryRepo->userCategories(Auth::user(), false);
        foreach ($categories as $category) {
            $categoriesArray[$category->id] = $category->name;
        }
        return $categoriesArray;
    }
}