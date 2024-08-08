<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;
use App\Http\Resources\ServiceResourse;
use App\Models\Service\Service;
use App\Repositories\Classes\ServiceRepository;
use App\Services\ResponseClass;

class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }
    public function index()
    {
        $service = Service::get();
        return ResponseClass::sendResponse(ServiceResourse::collection($service), '', 200);
    }
    public function search(ServiceRequest $request)
    {
        $request->validated();
        $name = $request->input('name');
        $services = $this->serviceRepository->searchByName($name);
        return ResponseClass::sendResponse(ServiceResourse::collection($services), '', 200);
    }

}
