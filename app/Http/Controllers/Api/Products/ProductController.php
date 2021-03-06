<?php

namespace App\Http\Controllers\Api\Products;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\NutritionalFact;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\Products\ProductCollection;
use App\Http\Resources\Categories\CategoryCollection;

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

        return $this->showAll($data, 200, ProductCollection::class);
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
        $rules = ['name' => 'required',
            'price' => 'required|numeric',
            'brand_id'=>'required|exists:brands,id',
        ];

        $this->validate($request, $rules);
        $product = Product::create($request->all());
        $product->categories()->sync(collect($request->categories)->pluck('id'));
        $product->tags()->sync(collect($request->tags)->pluck('id'));
        if ($request->facts) {
            foreach (collect($request->facts) as $item){
                $item['product_id']=$product->id;
                $fact =  NutritionalFact::create($item);
                foreach (collect($item['children']) as $child){
                    $child['product_id'] = $product->id;
                    $child['parent_id'] = $fact->id;
                    NutritionalFact::create($child);
                }
            }
        }

        $product = $product->fresh();

        return $this->showOne($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     *
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return $this->showOne($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
        if ($product->isClean()) {
            return $this->errorNoClean();
        }
        $product->save();
        $product->categories()->sync(collect($request->categories)->pluck('id'));
        $product->tags()->sync(collect($request->tags)->pluck('id'));

        $product = $product->fresh();

        return $this->showOne($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->showOne($product);
    }

    public function search(Request $request)
    {
        $data = Product::search($request->search)->get();
        $data = $data->where('quantity','>',0);

        $request->query->remove('search');

        return $this->showAll($data, 200, ProductCollection::class);
    }
}
