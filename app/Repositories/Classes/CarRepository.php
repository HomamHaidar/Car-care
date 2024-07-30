<?php

namespace App\Repositories\Classes;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class CarRepository  implements \App\Repositories\Interfaces\CarRepository
{

    public function index()
    {
        $car= Car::all();

        return  CarResource::collection($car);
    }

    public function findBy(Request $request)
    {
             return $request;
    }

    public function store($request)
    {
        $validated = $request->validated();

        $car=Car::create($validated);
        return response(new CarResource($car),200);
    }

    public function show($id)
    {
        $car=Car::findOrFail($id);
        return new CarResource($car);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request, $id)
    {
        $validated = $request->validated();
        $car=Car::FindOrFail($id);

        $car->update($validated);
        return response(new CarResource($car),202);
    }

    public function destroy($id)
    {
        $car=Car::FindOrFail($id);

        $car->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
