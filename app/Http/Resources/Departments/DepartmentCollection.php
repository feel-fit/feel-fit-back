<?php

namespace App\Http\Resources\Departments;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class DepartmentCollection extends ResourceCollection
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
            return ['id' => (int)$item->id,
                'name' => (string)$item->name,
                'cities' => $item->cities,
                'created_at' => (string)$item->created_at,
                'updated_at' => (string)$item->updated_at,
                'deleted_at' => (string)$item->deleted_at ? $item->deleted_at : null,
            ];

        });
    }
}
