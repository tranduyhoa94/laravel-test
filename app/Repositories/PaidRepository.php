<?php

namespace App\Repositories;

use App\Models\Paid;
use App\Repositories\BaseRepository;

class PaidRepository extends BaseRepository
{
    public function getModel()
    {
        return Paid::class;
    }
}