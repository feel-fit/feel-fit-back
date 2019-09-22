<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     *
     * @return Collection
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'identification' => $item->identification,
                'gender' => $item->gender ?? 'masculino',
                'phone' => $item->phone,
                'roles' => $item->getRoleNames(),
                'status' => (boolean) $item->status,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'addresses'=> $item->addresses
            ];
        
        });
    }
}
