<?php

namespace Taskapp\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";

    protected $fillable = ['user_id', 'description', 'category_id'];

    public function user()
    {
        return $this->belongsTo('Taskapp\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('Taskapp\Models\Category');
    }
}
