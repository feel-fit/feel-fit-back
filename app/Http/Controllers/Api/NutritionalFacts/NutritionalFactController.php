<?php

namespace App\Http\Controllers\Api\NutritionalFacts;

use App\Http\Controllers\ApiController;
use App\Http\Resources\NutritionalFacts\NutritionalFactCollection;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\NutritionalFact;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class NutritionalFactController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = NutritionalFact::all();

        return $this->showAll($data,200,NutritionalFactCollection::class);
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
            'quantity' => 'nullable',
            'percentage' => 'nullable',
            'product_id' => 'required|numeric',
            'parent_id' => 'numeric|nullable',
            'position_fact' => 'string|required',
        ];

        $this->validate($request, $rules);
        $data = NutritionalFact::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  NutritionalFact  $nutritionalFact
     * @return JsonResponse
     */
    public function show(NutritionalFact $nutritionalFact)
    {
        return $this->showOne($nutritionalFact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  NutritionalFact  $nutritionalFact
     * @return JsonResponse
     */
    public function update(Request $request, NutritionalFact $nutritionalFact)
    {
       
        $nutritionalFact->fill($request->all());
        if ($nutritionalFact->isClean()) {
            return $this->errorNoClean();
        }
        $nutritionalFact->save();

        return $this->showOne($nutritionalFact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NutritionalFact  $nutritionalFact
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(NutritionalFact $nutritionalFact)
    {
        $nutritionalFact->delete();

        return $this->showOne($nutritionalFact);
    }
}
