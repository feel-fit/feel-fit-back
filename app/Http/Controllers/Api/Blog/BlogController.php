<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Blog\BlogCollection;
use Illuminate\Http\Request;
use \App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends ApiController
{
    public function index(){
        $data = Blog::all();
        return $this->showAll($data, 200, BlogCollection::class);
    }

    public function  store(Request $request){
        $rules=[
            'title'=>'required|string',
            'author'=>'required|string',
            'text_header'=>'required|string',
            'subtitle'=>'nullable|string',
            "text_right"=>'nullable|string',
            "text_body"=>'required|string',
            "photo"=>'required|image',
            "text_footer"=>'nullable|string'
        ];
        $this->validate($request,$rules);
        $blog = new Blog($request->all());
        $blog->photo = $request->file('photo')->store('blog','public');
        $blog->save();
        return $this->showOne($blog);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return $this->showOne($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules=[
            'title'=>'string',
            'author'=>'string',
            'text_header'=>'string',
            'subtitle'=>'nullable|string',
            "text_right"=>'nullable|string',
            "text_body"=>'string',
            "photo"=>'image',
            "text_footer"=>'nullable|string'
        ];
        $this->validate($request,$rules);
        $blog = Blog::find($id);
        $imgeAux = $blog->photo;
        $blog->fill($request->all());
        if($request->has('photo')){
            Storage::disk('public')->delete($imgeAux);
            $blog->photo = $request->file('photo')->store('blog','public');
        }
        $blog->save();
        return $this->showOne($blog);
    }

    public function latest(){
        $blog = Blog::latest()->first();
        return $this->showOne($blog);
    }

    public function latests(){
        $blog = Blog::latest()->limit(6)->get();
        return $this->showAll($blog, 200, BlogCollection::class);
    }
}
