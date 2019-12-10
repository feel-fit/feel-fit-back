<?php

namespace App\Http\Resources\PositiveMessage;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PositiveMessageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return [
                'id' => $item->id,
                'message' => (string) $item->message,
                'image' => url('storage/'.$item->image),
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
                'deleted_at' => (string) $item->deleted_at ? $item->deleted_at : null,
            ];
        });
    }
}
