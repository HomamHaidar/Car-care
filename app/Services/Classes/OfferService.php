<?php

namespace App\Services\Classes;


use App\Repositories\Classes\OfferRepository;
use Illuminate\Http\Request;

class OfferService
{
    protected  $offerrepository;
    public function __construct(OfferRepository $offerrepository){
        $this->offerrepository = $offerrepository;
    }
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
         $this->offerrepository->store($request);

    }

    public function show( $id){
        return $this->offerrepository->show($id);

    }
    public function edit($id){


    }



    public function update($request,$id){

        $offer= $this->offerrepository->update($request,$id);
        return $offer;
    }

    public function destroy($id){
          $this->offerrepository->destroy($id);

    }

}
