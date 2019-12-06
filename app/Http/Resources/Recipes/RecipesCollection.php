<?php


namespace App\Http\Resources\Recipes;


use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return Collection
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return [
                'id' => $item->id,
                'title' => (string) $item->title,
                'author' => (string) $item->author,
                'duration' => (string) $item->duration,
                'portions' => (int) $item->portions,
                'difficult' => (string) $item->difficult,
                'description'=>$item->description,
                'suggestion' => (string) $item->suggestion,
                'photo' => url('storage/'.$item->photo),
                'url_video'=>$item->url_video,
                'category' => $item->category,
                'created_at' => (string) $item->created_at,
                'updated_at' => (string) $item->updated_at,
                'deleted_at' => (string) $item->deleted_at ? $item->deleted_at : null,
            ];
        });
    }
}
