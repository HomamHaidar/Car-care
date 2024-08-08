<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'user_name'=>$this->name,
            'phone'=>$this->phone,
            'services_time'=>$this->services_time,
            "Written location"=>$this->location,
            "total"=>$this->total,
            "Latitude"=>$this->latitude,
            "longitude"=>$this->longitude,
            'services'=>ServiceResourse::collection($this->services),
            'car'=>new CarResource($this->car),
            'user'=>new UserResource($this->user),

        ];
    }
}
