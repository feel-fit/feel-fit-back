<?php

namespace App\Http\Controllers\Api\Images;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Images\ImageCollection;
use App\Models\Image;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class ImageController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Image::all();

        return $this->showAll($data, 200, ImageCollection::class);
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
            'product_id' => 'required|numeric',
            'position' => 'numeric|nullable',
        ];
        $this->validate($request, $rules);
        $data = Image::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Image  $image
     * @return JsonResponse
     */
    public function show(Image $image)
    {
        return $this->showOne($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Image  $image
     * @return JsonResponse
     */
    public function update(Request $request, Image $image)
    {
        $image->fill($request->all());
        if ($image->isClean()) {
            return $this->errorNoClean();
        }
        $image->save();

        return $this->showOne($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Image  $image
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return $this->showOne($image);
    }
}
