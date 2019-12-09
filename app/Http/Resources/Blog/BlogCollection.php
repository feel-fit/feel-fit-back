<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
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
                'id'=>$item->id,
                'title'=>$item->title,
                'author'=>$item->author,
                'text_header'=>$item->text_header,
                'subtitle'=>$item->subtitle,
                "text_right"=>$item->text_right,
                "text_body"=>$item->text_body,
                "photo"=>url("storage/$item->photo"),
                "text_footer"=>$item->text_footer,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });
    }
}
