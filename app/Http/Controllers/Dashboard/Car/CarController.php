<?php

namespace App\Http\Controllers\Dashboard\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Services\Classes\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_cars');

        if ($request->ajax()) {
            $cars= $this->carService->findBy($request);
            return response()->json($cars);
        }
        return view(checkView('dashboard.cars.index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_cars');

        return view(checkView('dashboard.cars.create'),  get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        $this->authorize('create_cars');

        $this->carService->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update_cars');

        $car = $this->carService->show($id);

        return view(checkView('dashboard.cars.edit'),  get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        $this->authorize('update_cars');

        $car= $this->carService->update($request->validated(), $id);
    return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_cars');

        $this->carService->destroy($id);
    }
}
