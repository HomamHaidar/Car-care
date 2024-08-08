<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ServiceResourse;
use App\Models\Car;
use App\Models\Order;
use App\Models\service\Service;
use App\Services\Classes\OrderService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService $orderService
    ) {
    }
    public function index()
    {
        return $this->orderService->index();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {

        $order= $this->orderService->store($request->validated());
        return response(new OrderResource($order),200);



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order= $this->orderService->show($id);
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, string $id)
    {

        $order= $this->orderService->update($request->validated(),$id);
        return response(new OrderResource($order),200);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->orderService->destroy($id);
        return response(null,Response::HTTP_NO_CONTENT);

    }
}
