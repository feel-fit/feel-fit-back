<?php

namespace App\Http\Resources\Tags;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class TagCollection extends ResourceCollection
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
            return [
                'id' => $item->id,
                'name' => $item->name,
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
            ];
        
        });
    }
}
