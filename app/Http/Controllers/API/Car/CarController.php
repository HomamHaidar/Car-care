<?php

namespace App\Http\Controllers\API\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Services\Classes\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(
        protected CarService $carService
    ) {
    }
    public function index()
    {
        return $this->carService->index();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        return $this->carService->store($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->carService->show($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        return $this->carService->update($request,$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->carService->destroy($id);

    }
}
