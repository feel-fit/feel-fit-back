<?php

namespace App\Http\Controllers\Api\Discounts;

use App\Models\User;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Discounts\DiscountCollection;

class DiscountUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Discount $discount)
    {
        return $this->showAll($discount->users, 200, UserCollection::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Discount  $discount
     * @param  User  $user
     * @return JsonResponse
     */
    public function store(Request $request, Discount $discount)
    {
        $discount->users()->sync(collect($request->all())->pluck('id'));

        return $this->showOne($discount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(Discount $discount, User $user)
    {
        $discount->users()->findOrFail($user->id);
        $discount->users()->detach([$user->id]);

        return $this->showOne($discount->refresh());
    }
}
