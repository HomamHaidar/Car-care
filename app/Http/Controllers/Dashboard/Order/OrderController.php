<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\Classes\OrderService;
use App\Services\Classes\ServiceService;

use App\Services\Classes\UserService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    protected $serviceService;
    protected $userService;

    public function __construct(OrderService $orderService, ServiceService  $serviceService,UserService $userService)
    {
        $this->orderService = $orderService;
        $this->serviceService = $serviceService;
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_orders');

        if ($request->ajax()) {
            $orders = $this->orderService->findBy($request);
            return response()->json($orders);
        }
        return view(checkView('dashboard.orders.index'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_orders');

        $services = $this->serviceService->findBy(request());
        $users = $this->userService->findBy(request());
        return view(checkView('dashboard.orders.create'), get_defined_vars());
    }

    /**
     * @param OrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        $this->authorize('create_orders');

        $this->orderService->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show($order)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $this->authorize('update_offers');

        $order = $this->orderService->show($id);
        $services = $this->serviceService->findBy(request());
        $users = $this->userService->findBy(request());

        return view(checkView('dashboard.orders.edit'),  get_defined_vars());
    }

    /**
     * @param OrderRequest $request
     * @param              $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderRequest $request, $id)
    {
        $this->authorize('update_orders');
        $order= $this->orderService->update($request->validated(),$id);

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_orders');

        $this->orderService->destroy($id);
    }
}
