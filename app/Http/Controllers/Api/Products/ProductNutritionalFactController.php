<?php

namespace App\Http\Controllers\Api\Products;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\NutritionalFact;
use Illuminate\Http\JsonResponse;
use function GuzzleHttp\Promise\all;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Categories\CategoryCollection;
use App\Http\Resources\NutritionalFacts\NutritionalFactCollection;

class ProductNutritionalFactController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Product $product)
    {
        $data = $product->nutritionalFacts;

        return $this->showAll($data, 200, NutritionalFactCollection::class);
    }

    public function store(Request $request, Product $product)
    {
        $listchildrenfact = collect([]);
        foreach (collect($request->all()) as $item) {
            $fact = NutritionalFact::find($item['id']);
            if ($fact) {
                $fact->update($item);
            } else {
                if(array_key_exists('parent_id', $item)){
                    $item['parent_id'] = $listchildrenfact->get($item['parent_id']);
                    NutritionalFact::create($item);
                }else{
                   $fact =  NutritionalFact::create($item);
                   $listchildrenfact->put($item['id'],$fact->id);
                }
            }
        }

        $product = $product->refresh('nutritionalFacts');

        return $this->successResponse($product->nutritionalFacts);
    }
}
