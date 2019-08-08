<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Products\ProductCollection;
use App\Models\Product;
use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Product::all();

        return $this->showAll($data,200,ProductCollection::collection());
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
            'category_id' => 'numeric|required',
            'description' => 'string|required',
            'price' => 'required|numeric',
            'surprise_box' => 'boolean',
        ];

        $this->validate($request, $rules);
        $data = Product::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return $this->showOne($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @return JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        if ($product->isClean()) {
            return $this->errorNoClean();
        }
        $product->save();

        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->showOne($product);
    }
}
