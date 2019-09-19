<?php

namespace App\Http\Controllers\Api\Addresses;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Addresses\AddressCollection;
use App\Models\Address;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AddressController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Address::all();
        
        return $this->showAll($data, 200, AddressCollection::class);
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
        $rules = ['name'    => 'required',
                  'address' => 'required',
                  'user_id' => 'numeric',
                  'city_id' => 'numeric',];
        $this->validate($request, $rules);
        $data = Address::create($request->all());
        
        return $this->showOne($data, 201);
    }
    
    /**
     * Display the specified resource.
     *
     * @param Address $address
     *
     * @return JsonResponse
     */
    public function show(Address $address)
    {
        return $this->showOne($address);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Address $address
     *
     * @return JsonResponse
     */
    public function update(Request $request, Address $address)
    {
        $address->fill($request->all());
        if($address->isClean()){
            return $this->errorNoClean();
        }
        $address->save();
        
        return $this->showOne($address);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Address $address)
    {
        $address->delete();
        
        return $this->showOne($address);
    }
}
