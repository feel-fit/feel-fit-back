<?php

namespace App\Http\Resources\Sliders;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderCollection extends ResourceCollection
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
            return ['id'         => $item->id,
                    'name'       => $item->name,
                    'url'        => url($item->url),
                    'position'   => $item->position,
                    'created_at' => (string) $item->created_at,
                    'updated_at' => (string) $item->updated_at,];
        });
    }
}
