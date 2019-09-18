<?php

namespace App\Http\Controllers\Api\Shoppings;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Shoppings\ShoppingCollection;
use App\Models\Shopping;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class ShoppingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Shopping::all();

        return $this->showAll($data,200,ShoppingCollection::class);
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
            'status_order_id' => 'numeric|nullable',
            'user_id' => 'numeric|required',
            'discount_id' => 'numeric|nullable',
            'address_id' => 'nullable|numeric',
            'shipping_id' => 'numeric|nullable',
            'payment_id' => 'numeric|nullable',
            'total' => 'numeric|required',
        ];

        $this->validate($request, $rules);
        $data = Shopping::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Shopping  $shopping
     * @return JsonResponse
     */
    public function show(Shopping $shopping)
    {
        return $this->showOne($shopping);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Shopping  $shopping
     * @return JsonResponse
     */
    public function update(Request $request, Shopping $shopping)
    {
        $shopping->fill($request->all());
        if ($shopping->isClean()) {
            return $this->errorNoClean();
        }
        $shopping->save();

        return $this->showOne($shopping);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Shopping  $shopping
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Shopping $shopping)
    {
        $shopping->delete();

        return $this->showOne($shopping);
    }
}
