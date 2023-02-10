<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;

abstract class BaseRepository extends RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        return $this->model = $this->getModel();
    }

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        $model = $this->model->find($id);
        if($model) {
            return $model->update($data);
        }

        return false;
    }

    public function delete($id)
    {
       return $this->model->destroy($id);
    }
}