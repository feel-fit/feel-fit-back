<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Products\ProductCollection;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Category $category)
    {
        $data = $category->products;
        return $this->showAll($data, 200 ,ProductCollection::class);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @param  Category  $category
     * @return JsonResponse
     */
    public function update(Request $request, Category $category, Product $product)
    {
        $category->products()->syncWithoutDetaching([$product->id]);

        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @param  Category  $category
     * @return JsonResponse
     */
    public function destroy(Category $category, Product $product)
    {
        $category->products()->findOrFail($product->id);
        $category->products()->detach([$product->id]);

        return $this->showOne($product->refresh());
    }
}
