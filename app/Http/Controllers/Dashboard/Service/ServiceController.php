<?php

namespace App\Http\Controllers\Dashboard\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;
use App\Services\Classes\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
    //    $this->authorize('view_users');

        if ($request->ajax()) {
            $services = $this->serviceService->findBy($request);
            return response()->json($services);
        }
        return view(checkView('dashboard.services.index'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        //$this->authorize('create_users');
        return view(checkView('dashboard.services.create'));
    }
    /**
     * @param UserRequest $request
     */
    public function store(ServiceRequest $request)
    {
        //$this->authorize('create_users');
        $this->serviceService->store($request->validated());
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
     {

     }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id)
    {
        $service = $this->serviceService->find($id);
     return view(checkView('dashboard.services.edit'), get_defined_vars());
    }

    /**
     * @param UserRequest $request
     * @param              $id
     */
    public function update(ServiceRequest $request, $id)
    {
    //    $this->authorize('update_users');
        return $this->serviceService->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    //    $this->authorize('delete_users');

 $this->serviceService->destroy($id);
    }
}
