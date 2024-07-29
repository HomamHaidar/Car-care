<?php

namespace App\Repositories\Classes;

use App\Http\Resources\OfferResource;

use App\Models\offer\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OfferRepository extends BasicRepository implements \App\Repositories\Interfaces\OfferRepository
{
    protected array $fieldSearchable = [
       "title","description","code",
    ];

    public function model(): string
    {
        return Offer::class;
    }

    public function index()
    {
        $offer= Offer::with('Service')->get();

        return  OfferResource::collection($offer);
    }
    public function findBy(Request $request, $andsFilters = []): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(orderBy:$request->order, andsFilters: $andsFilters);
    }
    public function get_valid_offer()
    {
        $offer= Offer::with('Service')->where('expire_date','>',now())->get();

        return  OfferResource::collection($offer);
    }

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image']  = storeImage('offer', $data['image']);
        }
        $offer=  $this->create($data);

        $offer->translateOrNew("ar")->title = $data['ar_title'];
        $offer->translateOrNew("ar")->description = $data['ar_description'];

        $offer->translateOrNew("en")->title = $data['en_title'];
        $offer->translateOrNew("en")->description = $data['en_description'];

        $offer->save();


    }

    public function show($id)
    {
        $Offer=Offer::findOrFail($id);
        return new OfferResource($Offer);
    }
    public function edit($id)
    {
        return $this->find($id);
    }

    public function update($request, $id)
    {

        $offer = $this->find($id);
        if (isset($request['image'])) {
            $request['image'] = storeImage('Offer', $request['image']) ?? $offer->image;
            deleteImage('offer', $offer['image']);
        }

        return $this->save($request, $id);
    }


    public function destroy($id): mixed
    {
        $offer = $this->find($id);

        deleteImage('Offer', $offer['image']);
        return $this->delete($id);
    }



    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function getFieldsRelationShipSearchable()
    {
        // TODO: Implement getFieldsRelationShipSearchable() method.
    }

    public function translationKey()
    {
        // TODO: Implement translationKey() method.
    }
    public function create($request)
    {
        return $this->model->create($request);
    }

}
