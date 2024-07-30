<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface CarRepository
{
    public function index();
    public function findBy(Request $request);

    public function store($request);

    public function show($id);
    public function edit($id);
    public function update($request, $id);

    public function destroy($id);
}
