<?php

namespace App\Http\Controllers\Api\Cities;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Cities\CityCollection;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class CityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = City::all();

        return $this->showAll($data,200,CityCollection::class);
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
            'department_id' => 'required|numeric',
        ];
        $this->validate($request, $rules);
        $data = City::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  City  $city
     * @return JsonResponse
     */
    public function show(City $city)
    {
        return $this->showOne($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  City  $city
     * @return JsonResponse
     */
    public function update(Request $request, City $city)
    {
        $city->fill($request->all());
        if ($city->isClean()) {
            return $this->errorNoClean();
        }
        $city->save();

        return $this->showOne($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  City  $city
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $city->delete();

        return $this->showOne($city);
    }
}
