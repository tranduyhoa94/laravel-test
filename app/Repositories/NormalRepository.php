<?php

namespace App\Repositories;

use App\Models\Normal;

class NormalRepository
{
    protected $mormal;

    public function __construct(Normal $mormal)
    {
        $this->mormal = $mormal;
    }

    public function create($attributes)
    {
        return $this->mormal->create($attributes);
    }

    public function findById($id)
    {
        return $this->mormal->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        $mormal = $this->mormal->find($id);
        if($mormal) {
            return $mormal->update($data);
        }
    }

    public function delete($id)
    {
       return $this->mormal->destroy($id);
    }
}