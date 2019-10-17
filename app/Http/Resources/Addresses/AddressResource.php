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
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return ['id' => (int)$this->id,
            'name' => $this->name,
            'address' => $this->address,
            'user' => $this->user,
            'city' => new CityResource($this->city),
            'city_id' => (int)$this->city->id,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'deleted_at' => (string)$this->deleted_at ? $this->deleted_at : null,
            ];
    }
}
