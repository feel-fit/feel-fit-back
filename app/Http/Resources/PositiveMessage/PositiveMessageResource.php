<?php

namespace App\Http\Resources\PositiveMessage;

use Illuminate\Http\Resources\Json\JsonResource;

class PositiveMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'message'=>$this->message,
            'image'=>url('storage/'.$this->image),
        ];
    }
}
