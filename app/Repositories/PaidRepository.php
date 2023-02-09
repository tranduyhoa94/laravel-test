<?php

namespace App\Repositories;

use App\Models\Paid;

class PaidRepository
{
    protected $paid;

    public function __construct(Paid $paid)
    {
        $this->paid = $paid;
    }

    public function create($attributes)
    {
        return $this->paid->create($attributes);
    }

    public function findById($id)
    {
        return $this->paid->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        $paid = $this->paid->find($id);
        if($paid) {
            return $paid->update($data);
        }
    }

    public function delete($id)
    {
       return $this->paid->destroy($id);
    }
}