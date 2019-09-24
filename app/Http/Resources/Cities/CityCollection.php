<?php

namespace App\Http\Resources\Cities;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
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
            return ['id'            => (int)$item->id,
                    'name'          => $item->name,
                    'department'    => $item->department,
                    'department_id' => $item->department_id,
                    'created_at'    => $item->created_at,];
        });
    }
}
