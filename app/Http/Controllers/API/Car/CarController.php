<?php

namespace App\Http\Controllers\API\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Services\Classes\CarService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CarController extends Controller
{
    public function __construct(
        protected CarService $carService
    ) {
    }
    public function index()
    {
        $car= $this->carService->index();
        return  CarResource::collection($car);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {


        $car=$this->carService->store($request->validated());
        return response(new CarResource($car),200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car= $this->carService->show($id);
        return new CarResource($car);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        $car= $this->carService->update($request->validated(),$id);

        return response(new CarResource($car),202);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

         $this->carService->destroy($id);
        return response(null,Response::HTTP_NO_CONTENT);

    }
}
