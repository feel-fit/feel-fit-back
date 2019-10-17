<?php

namespace App\Http\Controllers\Api\Images;

use Exception;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Images\ImageCollection;
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
     * @param Request $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules = ['product_id' => 'required|numeric',
            'file' => 'file|max:300',
            'position' => 'numeric|nullable', ];
        $this->validate($request, $rules);
        $file = $request->file('file');
        $image = \Intervention\Image\Facades\Image::make($file)->fit(600)->encode('png');
        $path = $file->hashName('public/productos');

        Storage::put($path, (string) $image);
        $url = Storage::url($path);

        if ($request->id) {
            $imagen = Image::find($request->id);
            if ($imagen) {
                Storage::delete($imagen->url);
                $imagen->url = $url;
                $imagen->save();
            } else {
                $request->merge(['url' => $url]);
                $imagen = Image::create($request->all());
            }
        } else {
            $request->merge(['url' => $url]);
            $imagen = Image::create($request->all());
        }

        return $this->showOne($imagen, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Image $image
     *
     * @return JsonResponse
     */
    public function show(Image $image)
    {
        return $this->showOne($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Image $image
     *
     * @return JsonResponse
     */
    public function update(Request $request, Image $image)
    {
        $rules = [
            'file' => 'file|max:300',
        ];

        $this->validate($request, $rules);

        Storage::delete($image->url);

        $file = $request->file('file');
        $imagen = \Intervention\Image\Facades\Image::make($file)->fit(600)->encode('png');
        $path = $file->hashName('public/productos');
        Storage::put($path, (string) $imagen);
        $image->url = Storage::url($path);

        $image->save();

        return $this->showOne($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Image $image
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return $this->showOne($image);
    }
}
