<?php

namespace Taskapp\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function user()
    {
        return $this->belongsTo('Taskapp\Models\User');
    }

    public function tasks()
    {
        return $this->hasMany('Taskapp\Models\Task');
    }

    public function getCompletedTasksAttribute()
    {
        return $this->tasks()->where('completed', true)->count();
    }

    public function getPendingTasksAttribute()
    {
        return $this->tasks()->where('completed', false)->count();
    }
}
