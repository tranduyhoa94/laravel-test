<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\Models\Paid;

class Normal extends Model
{
    use HasFactory;

    protected $table = "normals";

    protected $fillable = [
        'title',
        'content',
        'type', // 1:normal, 2: paid, 3:media, ....
    ];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    public function paids()
    {
        return $this->hasMany(Paid::class);
    }
}
