<?php

namespace App\Services\Classes;


use App\Repositories\Interfaces\OfferRepository;
use Illuminate\Http\Request;

class OfferService
{

    public function __construct(
        protected OfferRepository $offerrepository
    ){}
    public function findBy(Request $request)
    {
        return $this->offerrepository->findBy($request);
    }

    public function index(){
        return $this->offerrepository->index();
    }

  public function get_valid_offer(){
        return $this->offerrepository->get_valid_offer();
    }



    public function store($request){
        return $this->offerrepository->store($request);

    }

    public function show( $id){
        return $this->offerrepository->show($id);

    }
    public function edit($id){
        return $this->offerrepository->edit($id);

    }



    public function update($request,$id){
        return $this->offerrepository->update($request,$id);

    }

    public function destroy($id){
        return $this->offerrepository->destroy($id);

    }

}
