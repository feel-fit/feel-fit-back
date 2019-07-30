<?php

namespace App\Http\Controllers\Api\Payments;

use Exception;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;

class PaymentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Payment::all();

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
        ];

        $this->validate($request, $rules);
        $data = Payment::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Payment  $payment
     * @return JsonResponse
     */
    public function show(Payment $payment)
    {
        return $this->showOne($payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Payment  $payment
     * @return JsonResponse
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->fill($request->all());
        if ($payment->isClean()) {
            return $this->errorNoClean();
        }
        $payment->save();

        return $this->showOne($payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Payment  $payment
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return $this->showOne($payment);
    }
}
