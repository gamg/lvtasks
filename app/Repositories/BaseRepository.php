<?php

namespace Taskapp\Repositories;

use Taskapp\Models\User;

abstract class BaseRepository
{
    protected $filters = [];
    protected $columns = [];

    abstract public function getModel();

    public function find($id)
    {
        return $this->getModel()->find($id);
    }

    public function getAll()
    {
        return $this->getModel()->all();
    }

    public function create($data)
    {
        return $this->getModel()->create($data);
    }

    public function update($object, $data)
    {
        $object->fill($data);
        $object->save();
        return $object;
    }

    public function delete($object)
    {
        $object->delete();
    }

    public function search(User $user, array $data = [], $paginate = true, $recordsNumber = 5)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');

        $query = $this->getModel()->where('user_id', $user->id);

        foreach ($data as $index => $value) {
            if (isset($data[$index]) && $this->columns[$index]['like']) {
                $query->where($this->columns[$index]['column'], 'LIKE', "%$value%");
            } elseif (isset($data[$index])) {
                $query->where($this->columns[$index]['column'], $value);
            }
        }

        $query->orderBy('created_at', 'desc');

        return $paginate ? $query->paginate($recordsNumber)->appends($data)
            : $query->get();
    }
}