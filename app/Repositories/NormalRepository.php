<?php

namespace App\Repositories;

use App\Models\Normal;
use App\Repositories\BaseRepository;

class NormalRepository extends BaseRepository
{
    public function getModel()
    {
        return Normal::class;
    }
}