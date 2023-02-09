<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\MediaRepository;
use App\Repositories\PaidRepository;
use App\Repositories\NormalRepository;

class NormalService 
{
    const NORMAL_TYPE = 1;
    const MEDIA_TYPE = 2;
    const PAID_TYPE = 3;

    protected $mediaRepository;
    
    protected $paidRepository;

    protected $normalRepository;

    public function __construct(MediaRepository $mediaRepository, PaidRepository $paidRepository, NormalRepository $normalRepository)
    {
        $this->mediaRepository = $mediaRepository;
        $this->paidRepository = $paidRepository;
        $this->normalRepository = $normalRepository;
    }

    public function create(Request $request)
    {
        $input = $request->all();
        if (!empty($input) && (isset($input['type']) && in_array($input['type'], [self::NORMAL_TYPE, self::MEDIA_TYPE, self::PAID_TYPE]))) {
            $normal = $this->normalRepository->create($input);
            if ($input['type'] === self::MEDIA_TYPE) {
                $paramMedia = [
                    'regular_price' => $input['regular_price'],
                    'sale_price' => $input['sale_price'],
                    'normal_id' => $normal->id,
                ];
                
                $this->mediaRepository->create($paramMedia);
            }

            if ($input['type'] === self::PAID_TYPE) {
                $paramPaid = [
                    'thumbnail' => $input['thumbnail'],
                    'cover' => $input['cover'],
                    'normal_id' => $normal->id,
                ];

                $this->paidRepository->create($paramPaid);
            }

            return $normal;
        }

        return [];
    }

    public function update($id, Request $request) 
    {
        $input = $request->all();
        if (!empty($input) && (isset($input['type']) && in_array($input['type'], [self::NORMAL_TYPE, self::MEDIA_TYPE, self::PAID_TYPE]))) {
            $this->normalRepository->update($id, $input);

            if ($input['type'] === self::MEDIA_TYPE) {
                $paramMedia = [
                    'regular_price' => $input['regular_price'],
                    'sale_price' => $input['sale_price']
                ];
                
                $this->mediaRepository->update($input['media_id'], $paramMedia);
            }

            if ($input['type'] === self::PAID_TYPE) {
                $paramPaid = [
                    'thumbnail' => $input['thumbnail'],
                    'cover' => $input['cover']
                ];

                $this->paidRepository->update($input['paid_id'], $paramPaid);
            }

            return true;
        }
    }
}