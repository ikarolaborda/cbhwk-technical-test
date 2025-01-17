<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TurbineStoreRequest;
use App\Http\Requests\TurbineUpdateRequest;
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
        return new JsonResponse(
            [
                'turbines' => $this->service->getAllTurbines()
            ], Response::HTTP_OK);
    }

    public function show(Request $request, int $id): Response | JsonResponse
    {
        $turbine = $this->service->getById($id);
        if($turbine){
            return new JsonResponse(
                [
                    'turbine' => $turbine
                ], Response::HTTP_OK);
        }
        return new JsonResponse(
            [
                'message' => 'Turbine not found'
            ], Response::HTTP_NOT_FOUND);
    }

    public function store(TurbineStoreRequest $request): Response | JsonResponse
    {
        $turbine = $this->service->create($request->validated());

        if($turbine){
            return new JsonResponse(
                [
                    'message' => 'Turbine created successfully',
                    'turbine' => $turbine
                ], Response::HTTP_CREATED);
        }

        return new JsonResponse(
            [
                'message' => 'Failed to create turbine'
            ], Response::HTTP_BAD_REQUEST);
    }

    public function update(TurbineUpdateRequest $request, int $id): Response | JsonResponse
    {
        $turbine = $this->service->update($id, $request->validated());

        if($turbine){
            return new JsonResponse(
                [
                    'message' => 'Turbine updated successfully',
                    'turbine' => $turbine
                ], Response::HTTP_OK);
        }

        return new JsonResponse(
            [
                'message' => 'Failed to update turbine'
            ], Response::HTTP_BAD_REQUEST);
    }

    public function destroy(Request $request, int $id): Response | JsonResponse
    {
        $turbine = $this->service->delete($id);

        if($turbine){
            return new JsonResponse(
                [
                    'message' => 'Turbine deleted successfully'
                ], Response::HTTP_OK);
        }

        return new JsonResponse(
            [
                'message' => 'Failed to delete turbine'
            ], Response::HTTP_BAD_REQUEST);
    }
}
