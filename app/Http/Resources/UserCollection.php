<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Resources\Shoppings\ShoppingCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return ['id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'identification' => $item->identification,
                'gender' => $item->gender ?? 'masculino',
                'phone' => $item->phone,
                'roles' => $item->getRoleNames(),
                'shoppings' => new ShoppingCollection($item->shoppings),
                'discounts' => $item->discounts,
                'status' => (bool) $item->status,
                'email_verified_at' => (string) $item->email_verified_at ? $item->email_verified_at : null,
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
                'deleted_at' => (string) $item->deleted_at ? $item->deleted_at : null,
                'addresses' => $item->addresses, ];
        });
    }
}
