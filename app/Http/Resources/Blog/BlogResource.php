<?php


namespace App\Http\Resources\Blog;


use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'id'=> $this->id,
            'title'=> (string)$this->title,
            'author'=> (string)$this->author,
            'text_header'=> (string)$this->text_header,
            'subtitle'=> (string)$this->subtitle,
            "text_right"=> (string)$this->text_right,
            "text_body"=> (string)$this->text_body,
            "photo"=> url("storage/$this->photo"),
            "text_footer"=> (string)$this->text_footer,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];
    }
}
