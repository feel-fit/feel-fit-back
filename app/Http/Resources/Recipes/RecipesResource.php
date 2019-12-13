<?php

namespace App\Http\Resources\Recipes;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipesResource extends JsonResource
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
            'title'=>$this->title,
            'author'=>$this->author,
            'duration'=>$this->duration,
            'portions'=>$this->portions,
            'difficult'=>$this->difficult,
            'suggestion'=>$this->suggestion,
            'description'=>$this->description,
            'photo'=>url('storage/'.$this->photo),
            'category'=>$this->category,
            'url_video'=>$this->url_video,
            'ingredients'=>$this->ingredients,
            'preparations'=>$this->preparations,
            'supplys'=>$this->supplys,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => (string) $this->deleted_at ? $this->deleted_at : null,
        ];
    }
}
