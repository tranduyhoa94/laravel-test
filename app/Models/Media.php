<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Normal;

class Media extends Model
{
    use HasFactory;

    protected $table = "medias";

    protected $fillable = [
        'regular_price',
        'sale_price',
        'normal_id',
    ];

    public function normal()
    {
        return $this->belongsTo(Normal::class);
    }
}
