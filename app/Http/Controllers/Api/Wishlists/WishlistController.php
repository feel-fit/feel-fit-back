<?php

namespace App\Http\Controllers\Api\Wishlists;

use App\Http\Controllers\ApiController;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class WishlistController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Wishlist::all();

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
            'product_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ];

        $this->validate($request, $rules);
        $data = Wishlist::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Wishlist  $wishlist
     * @return JsonResponse
     */
    public function show(Wishlist $wishlist)
    {
        return $this->showOne($wishlist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Wishlist  $wishlist
     * @return JsonResponse
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        $wishlist->fill($request->all());
        if ($wishlist->isClean()) {
            return $this->errorNoClean();
        }
        $wishlist->save();

        return $this->showOne($wishlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Wishlist  $wishlist
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return $this->showOne($wishlist);
    }
}
