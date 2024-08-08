<?php

namespace App\Services\Classes;

use App\Http\Requests\OrderRequest;
use App\Models\Car;
use App\Models\Order;
use App\Models\service\Service;
use App\Repositories\Classes\OrderRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderService
{
    protected  $orderRepository;
    public function __construct(OrderRepository $orderRepository){
        $this->orderRepository = $orderRepository;
    }
    public function index(){
        return $this->orderRepository->index();
    }
    public function findBy(Request $request)
    {
        return $this->orderRepository->findBy($request);
    }

    public function store($request)
    {
        return $this->orderRepository->store($request);

    }


    public function show($id)
    {
        return $this->orderRepository->show($id);
    }

    public function update($request, $id)
    {
       return $this->orderRepository->update($request, $id);


    }

    public function destroy($id)
    {
        $this->orderRepository->destroy($id);
    }
}

