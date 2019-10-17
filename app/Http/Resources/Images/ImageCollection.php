<?php

namespace App\Http\Resources\Images;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageCollection extends ResourceCollection
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
            return [
                'id' => $item->id,
                'name' => $item->name,
                'url' => url($item->url),
                'position' => $item->position,
                'product_id' => $item->product_id,
                'created_at' => (string)$item->created_at,
                'updated_at' => (string)$item->updated_at,
                'deleted_at' => (string)$item->deleted_at ? $item->deleted_at : null,
            ];

        });
    }
}
