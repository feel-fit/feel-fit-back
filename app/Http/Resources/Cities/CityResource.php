<?php

namespace App\Http\Resources\Cities;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return ['id'         => (int)$this->id,
                'name'       => $this->name,
                'department'       => $this->department,
                'department_id'       => $this->department_id,
                'created_at' => $this->created_at,];
    }
}
