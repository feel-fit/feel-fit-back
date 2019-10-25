<?php

namespace App\Http\Controllers\Api\Sliders;

use Exception;
use App\Models\Image;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\Sliders\SliderCollection;

class SliderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Slider::all();

        return $this->showAll($data, 200, SliderCollection::class);
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
            'position' => 'numeric|nullable',
            'file' => 'required|image',
        ];

        $this->validate($request, $rules);
        $data = new Slider($request->all());
        $data->url = $this->storeImage($request);
        $data->save();

        return $this->showOne($data, 201);
    }

    /**
     * Metodo para guardar la  imagen del slider.
     * @param Request $request
     * @return mixed
     */
    private function storeImage(Request $request)
    {
        $file = $request->file('file');
        $image = \Intervention\Image\Facades\Image::make($file)->fit(2000)->encode('png');
        $path = $file->hashName('public/sliders');
        Storage::put($path, (string) $image);

        return  Storage::url($path);
    }

    /**
     * Display the specified resource.
     *
     * @param  Slider  $slider
     * @return JsonResponse
     */
    public function show(Slider $slider)
    {
        return $this->showOne($slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Slider  $slider
     * @return JsonResponse
     */
    public function update(Request $request, Slider $slider)
    {
        $rules = [
            'name' => '',
            'position' => 'numeric|nullable',
            'file' => 'image',
        ];

        $this->validate($request, $rules);

        $slider->fill($request->all());

        if ($request->has('file')) {
            Storage::delete($slider->url);
            $slider->url = $this->storeImage($request);
        }

        $slider->save();

        return $this->showOne($slider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Slider  $slider
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Slider $slider)
    {
        Storage::delete($slider->url);
        $slider->delete();

        return $this->showOne($slider);
    }
}
