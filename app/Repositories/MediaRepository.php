<?php

namespace App\Repositories;

use App\Models\Media;

class MediaRepository
{
    protected $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function create($attributes)
    {
        return $this->media->create($attributes);
    }

    public function findById($id)
    {
        return $this->media->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        $media = $this->media->find($id);
        if($media) {
            return $media->update($data);
        }

        return false;
    }

    public function delete($id)
    {
       return $this->media->destroy($id);
    }
}