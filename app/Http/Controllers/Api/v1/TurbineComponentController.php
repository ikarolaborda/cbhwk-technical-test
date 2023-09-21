<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\TurbineComponentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TurbineComponentController extends Controller
{

    public function __construct(
        protected TurbineComponentService $service
    )
    {
    }

    public function index(int $turbineId): JsonResponse
    {
        return new JsonResponse(
            [
                'components' => $this->service->getRelatedTurbine($turbineId)->components

            ], Response::HTTP_OK
        );
    }
}
