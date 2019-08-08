<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Discounts\DiscountCollection;
use App\Http\Resources\UserCollection;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserDiscountController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(User $user)
    {
        return $this->showAll($user->discounts, 200, DiscountCollection::class);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User  $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user, Discount $discount)
    {
        $user->discounts()->syncWithoutDetaching([$discount->id]);

        return $this->showOne($discount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user, Discount $discount)
    {
        $user->discounts()->findOrFail($discount->id);
        $user->discounts()->detach([$discount->id]);

        return $this->showOne($discount->refresh());
    }
}
