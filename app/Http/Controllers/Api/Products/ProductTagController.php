<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Tags\TagCollection;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ProductTagController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Product $product)
    {
        $data = $product->tags;
        return $this->showAll($data, 200 ,TagCollection::class);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @param  Tag  $tag
     * @return JsonResponse
     */
    public function update(Request $request, Product $product,Tag $tag)
    {
        $product->categories()->syncWithoutDetaching([$tag->id]);

        return $this->showOne($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @param  Tag  $tag
     * @return JsonResponse
     */
    public function destroy(Product $product, Tag $tag)
    {
        $product->categories()->findOrFail($tag->id);
        $product->categories()->detach([$tag->id]);

        return $this->showOne($tag->refresh());
    }
}
