<?php

namespace App\Http\Controllers\Api\StatusOrders;

use Exception;
use App\Models\StatusOrder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\StatusOrders\StatusOrderCollection;

class StatusOrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = StatusOrder::all();

        return $this->showAll($data, 200, StatusOrderCollection::class);
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
        ];

        $this->validate($request, $rules);
        $data = StatusOrder::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  StatusOrder  $statusOrder
     * @return JsonResponse
     */
    public function show(StatusOrder $statusOrder)
    {
        return $this->showOne($statusOrder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  StatusOrder  $statusOrder
     * @return JsonResponse
     */
    public function update(Request $request, StatusOrder $statusOrder)
    {
        $statusOrder->fill($request->all());
        if ($statusOrder->isClean()) {
            return $this->errorNoClean();
        }
        $statusOrder->save();

        return $this->showOne($statusOrder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StatusOrder  $statusOrder
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(StatusOrder $statusOrder)
    {
        $statusOrder->delete();

        return $this->showOne($statusOrder);
    }
}
