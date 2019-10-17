<?php

namespace App\Http\Controllers\Api\Products;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use function GuzzleHttp\Promise\all;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Categories\CategoryCollection;

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

        return $this->showAll($data, 200, CategoryCollection::class);
    }

    public function update(Product $product, Category $category)
    {
        $product->categories()->syncWithoutDetaching($category);

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
        $product->categories()->detach($category);

        return $this->showOne($category);
    }
}
