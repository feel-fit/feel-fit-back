<?php

namespace App\Http\Resources\Addresses;

use App\Http\Resources\Cities\CityCollection;
use App\Http\Resources\Cities\CityResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return ['id'      => (int)$item->id,
                    'name'    => $item->name,
                    'address' => $item->address,
                    'user'    => $item->user,
                    'city' => new CityResource($item->city),
                    'created_at' => (string) $item->created_at,];
        });
    }
}
