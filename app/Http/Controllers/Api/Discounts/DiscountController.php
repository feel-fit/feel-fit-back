<?php

namespace App\Http\Controllers\Api\Discounts;

use App\Http\Controllers\ApiController;
use App\Models\Discount;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class DiscountController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Discount::all();

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
            'value' => 'required|numeric',
        ];
        $this->validate($request, $rules);
        $data = Discount::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Discount  $discount
     * @return JsonResponse
     */
    public function show(Discount $discount)
    {
        return $this->showOne($discount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Discount  $discount
     * @return JsonResponse
     */
    public function update(Request $request, Discount $discount)
    {
        $discount->fill($request->all());
        if ($discount->isClean()) {
            return $this->errorNoClean();
        }
        $discount->save();

        return $this->showOne($discount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Discount  $discount
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Discount $discount)
    {
         $discount->delete();

        return $this->showOne($discount);
    }
}
