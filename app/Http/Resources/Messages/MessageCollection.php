<?php

namespace App\Http\Resources\Messages;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageCollection extends ResourceCollection
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
            return ['id' => $item->id,
                'user_id' => $item->user_id,
                'name' => $item->name,
                'email' => $item->email,
                'description' => $item->description,
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
                'deleted_at' => (string) $item->deleted_at ? $item->deleted_at : null, ];
        });
    }
}
