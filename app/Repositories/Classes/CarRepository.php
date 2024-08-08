<?php

namespace App\Repositories\Classes;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
class CarRepository extends BasicRepository implements \App\Repositories\Interfaces\CarRepository
{

    protected array $fieldSearchable = [
        'id', 'brand', 'category', 'oil'
    ];
    public function index()
    {
        $car= Car::all();
        return $car;
    }

    public function findBy(Request $request, $andsFilters = []): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(orderBy:$request->order, andsFilters: $andsFilters);
    }


    public function store($request)
    {

        $car=Car::create($request);
        return $car;
    }

    public function show($id)
    {
        return $this->find($id);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request, $id)
    {
        $car=Car::FindOrFail($id);

        $car->update($request);
        return $car;
    }

    public function destroy($id)
    {
        return $this->delete($id);

    }

    public function model()
    {
        return Car::class;

    }

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function getFieldsRelationShipSearchable()
    {
        return $this->model->searchRelationShip;
    }

    public function translationKey()
    {
        return $this->model->translationKey();
    }

}
