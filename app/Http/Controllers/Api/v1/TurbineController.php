<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\TurbineService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TurbineController extends Controller
{
    public function __construct(
        protected TurbineService $service
    )
    {
    }

    public function index(): Response | JsonResponse
    {
        return new JsonResponse(['turbines' => $this->service->getAllTurbines()], Response::HTTP_OK);
    }
}
