<?php

namespace App\Http\Controllers\Api\DetailShoppings;

use App\Http\Controllers\ApiController;
use App\Http\Resources\DetailShoppings\DetailShoppingCollection;
use App\Mail\ShoppingMail;
use App\Models\Shopping;
use Exception;
use Illuminate\Http\Request;
use App\Models\DetailShopping;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class DetailShoppingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = DetailShopping::all();

        return $this->showAll($data, 200, DetailShoppingCollection::class);
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

        $rules = ['items.*.shopping_id' => 'required|numeric',
            'items.*.product_id' => 'required|numeric',
            'items.*.value' => 'required|numeric',
            'items.*.quantity' => 'required|numeric',];

        $this->validate($request, $rules);

        if ($request->items) {
            $data = collect($request->items);
        } else {
            $data = collect([$request->all()]);
        }

        $data->each(function ($item) {
            DetailShopping::create($item);
        });


        $shopping = Shopping::with('details', 'user', 'address', 'statusOrder')->find($data->first()['shopping_id']);


        Mail::to($shopping->user->email)->send(new ShoppingMail($shopping));

        return $this->successResponse($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param DetailShopping $detailShopping
     *
     * @return JsonResponse
     */
    public function show(DetailShopping $detailShopping)
    {
        return $this->showOne($detailShopping);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DetailShopping $detailShopping
     *
     * @return JsonResponse
     */
    public function update(Request $request, DetailShopping $detailShopping)
    {
        $detailShopping->fill($request->all());
        if ($detailShopping->isClean()) {
            return $this->errorNoClean();
        }
        $detailShopping->save();

        return $this->showOne($detailShopping);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DetailShopping $detailShopping
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(DetailShopping $detailShopping)
    {
        $detailShopping->delete();

        return $this->showOne($detailShopping);
    }
}
