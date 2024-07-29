<?php

namespace App\Http\Controllers\API\Offer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Services\Classes\OfferService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected OfferService $offerService
    ) {
    }
    public function index()
    {

        return $this->offerService->index();
    }
    public function get_valid_offer()
    {
        return $this->offerService->get_valid_offer();
    }

    public function show(string $id)
    {

        return $this->offerService->show($id);
    }


}
