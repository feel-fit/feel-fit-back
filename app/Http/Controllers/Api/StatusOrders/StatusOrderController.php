<?php

namespace App\Http\Controllers\Api\StatusOrders;

use App\Http\Controllers\ApiController;
use App\Http\Resources\StatusOrders\StatusOrderCollection;
use App\Models\StatusOrder;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

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

        return $this->showAll($data,200,StatusOrderCollection::class);
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
