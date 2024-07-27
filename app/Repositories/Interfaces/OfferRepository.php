<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface OfferRepository
{
    public function index();

    public function get_valid_offer();

    public function store($request);

    public function show($id);

    public function update($request, $id);

    public function destroy($id);
}
