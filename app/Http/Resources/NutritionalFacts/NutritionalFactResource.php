<?php

namespace App\Http\Resources\NutritionalFacts;

use Illuminate\Http\Resources\Json\JsonResource;

class NutritionalFactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
