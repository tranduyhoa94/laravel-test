<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Normal;

class Paid extends Model
{
    use HasFactory;

    protected $table = "paids";

    protected $fillable = [
        'thumbnail',
        'cover',
        'normal_id',
    ];

    public function normal()
    {
        return $this->belongsTo(Normal::class);
    }
}
