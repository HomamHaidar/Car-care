<?php

namespace App\Http\Controllers\Dashboard\Offer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\offer\Offer;
use App\Models\service\Service;
use App\Services\Classes\OfferService;
use App\Services\Classes\ServiceService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    protected $offerService;
    protected $servicesService;

    public function __construct(OfferService $offerService ,ServiceService $serviceService)
    {
        $this->offerService = $offerService;
        $this->servicesService = $serviceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_offers');

        if ($request->ajax()) {
            $admins = $this->offerService->findBy($request);
            return response()->json($admins);
        }
        return view(checkView('dashboard.offers.index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_offers');
        $services =Service::all();
        return view(checkView('dashboard.offers.create'),compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        $this->authorize('create_offers');

        $this->offerService->store($request->validated());
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
        $this->authorize('update_offers');

        $offer = $this->offerService->edit($id);
        $services = Service::all();
        return view(checkView('dashboard.offers.edit'),  get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, string $id)
    {
        $this->authorize('update_users');

        return $this->offerService->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_admins');

        $this->offerService->destroy($id);
    }
}
