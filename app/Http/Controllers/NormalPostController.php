<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NormalService;

class NormalPostController extends Controller
{
    protected $normalService;

    public function __construct(NormalService $normalService)
    {
        $this->normalService = $normalService;
    }

    public function index(Request $request)
    {
    }

    public function save(Request $request)
    {
        try {
            $data = $this->normalService->create($request);

            return response()->json([
                'statusCode' => 200,
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'messages' => $e->getMessage()
            ], 500);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $data = $this->normalService->update($id, $request);

            return response()->json([
                'statusCode' => 200,
                'data' => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'messages' => $e->getMessage()
            ], 500);
        }
    }
}
