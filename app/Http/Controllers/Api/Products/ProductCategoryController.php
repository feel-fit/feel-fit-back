<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Categories\CategoryCollection;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Product $product)
    {
        $data = $product->categories;
        return $this->showAll($data, 200 ,CategoryCollection::class);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @param  Category  $category
     * @return JsonResponse
     */
    public function update(Request $request, Product $product, Category $category)
    {
        $product->categories()->syncWithoutDetaching([$category->id]);

        return $this->showOne($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @param  Category  $category
     * @return JsonResponse
     */
    public function destroy(Product $product, Category $category)
    {
        $product->categories()->findOrFail($category->id);
        $product->categories()->detach([$category->id]);

        return $this->showOne($category->refresh());
    }
}
