<?php

namespace App\Http\Resources\DetailShoppings;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DetailShoppingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
