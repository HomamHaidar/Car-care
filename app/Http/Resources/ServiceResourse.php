<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ar_name' => $this->hasTranslation('ar') ? $this->translate('ar')->name : '',
            'en_name' => $this->hasTranslation('en') ? $this->translate('en')->name : '',
            'price' => $this->price,
            'availability' =>$this->availability,
        ];

    }
}
