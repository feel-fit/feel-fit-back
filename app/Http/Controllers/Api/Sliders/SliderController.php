<?php

namespace App\Http\Controllers\Api\Sliders;

use App\Http\Controllers\ApiController;
use App\Models\Slider;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

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

        return $this->showAll($data);
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

        ];

        $this->validate($request, $rules);
        $data = Slider::create($request->all());

        return $this->showOne($data, 201);
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
        $slider->fill($request->all());
        if ($slider->isClean()) {
            return $this->errorNoClean();
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
        $slider->delete();

        return $this->showOne($slider);
    }
}
