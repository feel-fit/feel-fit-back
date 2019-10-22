<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\User;
use App\Models\Discount;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserCollection;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Wishlists\WishlistCollection;

class UserWishlistController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(User $user)
    {
        return $this->showAll($user->wishlists, 200, WishlistCollection::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User  $user
     * @param  Wishlist  $wishlist
     * @return JsonResponse
     */
    public function update(Request $request, User $user, Wishlist $wishlist)
    {
        $user->discounts()->syncWithoutDetaching([$wishlist->id]);

        return $this->showOne($wishlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @param  Wishlist  $wishlist
     * @return JsonResponse
     */
    public function destroy(User $user, Wishlist $wishlist)
    {
        $user->discounts()->findOrFail($wishlist->id);
        $user->discounts()->detach([$wishlist->id]);

        return $this->showOne($wishlist->refresh());
    }
}
