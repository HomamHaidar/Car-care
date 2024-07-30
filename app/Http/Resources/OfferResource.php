<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'ar_title'=>$this->translate('ar')->title,
            'en_title'=>$this->translate('en')->title,
            'ar_description'=>$this->translate('ar')->description,
            'en_description'=>$this->translate('en')->description,
            'image'=>$this->image,
            'code'=>$this->code,
            'discount'=>$this->discount,
            'type'=>$this->type,
            'expire_date'=>$this->expire_date,
            'service'=>new ServiceResource($this->service)
        ];
    }
}
