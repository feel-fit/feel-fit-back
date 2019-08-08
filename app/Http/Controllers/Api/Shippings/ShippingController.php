<?php

namespace App\Http\Controllers\Api\Shippings;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Shippings\ShippingCollection;
use App\Models\Shipping;
use Exception;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;

class ShippingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Shipping::all();

        return $this->showAll($data,200,ShippingCollection::class);
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
            'value' => 'required|numeric',
            'transporter' => 'required|string',
            'track' => 'string|nullable',
        ];

        $this->validate($request, $rules);
        $data = Shipping::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Shipping  $shipping
     * @return JsonResponse
     */
    public function show(Shipping $shipping)
    {
        return $this->showOne($shipping);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Shipping  $shipping
     * @return JsonResponse
     */
    public function update(Request $request, Shipping $shipping)
    {
        $shipping->fill($request->all());
        if ($shipping->isClean()) {
            return $this->errorNoClean();
        }
        $shipping->save();

        return $this->showOne($shipping);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Shipping  $shipping
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Shipping $shipping)
    {
        $shipping->delete();

        return $this->showOne($shipping);
    }
}
