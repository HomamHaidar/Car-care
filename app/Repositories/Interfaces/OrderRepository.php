<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

interface OrderRepository
{
    public function index();
    public function findBy(Request $request);
    public function store(OrderRequest $request);
    public function show($id);
    public function edit( $id);
    public function update($request, $id);

    public function destroy($id);
}
