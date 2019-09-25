<?php

namespace App\Http\Resources\Addresses;

use App\Http\Resources\Cities\CityCollection;
use App\Http\Resources\Cities\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['id'      => (int)$this->id,
                'name'    => $this->name,
                'address' => $this->address,
                'user'    => $this->user,
                'city' => new CityResource($this->city),
                'created_at' => (string) $this->created_at,];
    }
}
