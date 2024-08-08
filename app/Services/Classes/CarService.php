<?php

namespace App\Services\Classes;


use App\Repositories\Classes\CarRepository;
use App\Repositories\Interfaces\OfferRepository;
use Illuminate\Http\Request;

class CarService
{

    public function __construct(
        protected CarRepository $carrepository
    ){}
    public function findBy(Request $request)
    {
        return $this->carrepository->findBy($request);
    }

    public function index(){
        return $this->carrepository->index();
    }



    public function store($request){
        return $this->carrepository->store($request);

    }

    public function show( $id){
        return $this->carrepository->show($id);

    }
    public function edit($id){
        return $this->carrepository->edit($id);

    }



    public function update($request,$id){
        return $this->carrepository->update($request,$id);

    }

    public function destroy($id){
         $this->carrepository->destroy($id);

    }

}
