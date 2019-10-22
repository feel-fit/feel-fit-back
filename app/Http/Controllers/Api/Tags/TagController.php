<?php

namespace App\Http\Controllers\Api\Tags;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Tags\TagCollection;
use Illuminate\Validation\ValidationException;

class TagController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Tag::all();

        return $this->showAll($data, 200, TagCollection::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);
        $data = Tag::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Tag  $tag
     * @return JsonResponse
     */
    public function show(Tag $tag)
    {
        return $this->showOne($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Tag  $tag
     * @return JsonResponse
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->fill($request->all());
        if ($tag->isClean()) {
            return $this->errorNoClean();
        }
        $tag->save();

        return $this->showOne($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag  $tag
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return $this->showOne($tag);
    }
}
