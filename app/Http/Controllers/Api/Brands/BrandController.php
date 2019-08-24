<?php

namespace App\Http\Controllers\Api\Brands;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Brands\BrandCollection;
use App\Http\Resources\Categories\CategoryCollection;
use App\Models\Brand;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BrandController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Brand::all();

        return $this->showAll($data,200,BrandCollection::class);
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
            'url' => 'required',
        ];
        $this->validate($request, $rules);
        $data = Brand::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Brand  $brand
     * @return JsonResponse
     */
    public function show(Brand $brand)
    {
        return $this->showOne($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Brand  $brand
     * @return JsonResponse
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->fill($request->all());
        if ($brand->isClean()) {
            return $this->errorNoClean();
        }
        $brand->save();

        return $this->showOne($brand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Brand  $brand
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return $this->showOne($brand);
    }
}
