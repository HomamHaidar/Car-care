<?php

namespace App\Repositories\Classes;

use App\Http\Resources\OfferResource;
use App\Models\offer\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferRepository implements \App\Repositories\Interfaces\OfferRepository
{


    public function index()
    {
        $offer= Offer::with('Service')->get();

        return  OfferResource::collection($offer);
    }
    public function get_valid_offer()
    {
        $offer= Offer::with('Service')->where('expire_date','>',now())->get();

        return  OfferResource::collection($offer);
    }

    public function store($request)
    {
        $validated = $request->validated();

            $filePath = Storage::disk('public')->put('images', request()->file('image'));
            $validated['image'] =$filePath;
        $offer=Offer::create($validated);

        $translations = $request->only(['ar_title', 'ar_title','en_title','en_description']);

        $offer->translateOrNew("ar")->title = $translations['ar_title'];
        $offer->translateOrNew("ar")->description = $translations['ar_title'];

        $offer->translateOrNew("en")->title = $translations['en_title'];
        $offer->translateOrNew("en")->description = $translations['en_description'];

        $offer->save();
        return response(new OfferResource($offer),200);

    }

    public function show($id)
    {
        $Offer=Offer::findOrFail($id);
        return new OfferResource($Offer);
    }
//
//    public function update($request, $id)
//    {
//        $offer=Offer::findOrFail($id);
//
//        return  request()->file($request->image);
//        if ($request->hasfile('image')) {
//         //   Storage::disk('public')->delete($offer->image);
//           // $filePath = Storage::disk('public')->put('images/',, 'public');
//            $validated['image'] = $filePath;
//        }
//
//        $translations = $request->only(['ar_title', 'ar_title','en_title','en_description']);
//
//        $offer->translateOrNew("ar")->title = $translations['ar_title'];
//        $offer->translateOrNew("ar")->description = $translations['ar_title'];
//
//        $offer->translateOrNew("en")->title = $translations['en_title'];
//        $offer->translateOrNew("en")->description = $translations['en_description'];
//
//        $offer->save();
//        $offer->update($request->all());
//        return response(new OfferResource($offer),202);
//    }
//
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
