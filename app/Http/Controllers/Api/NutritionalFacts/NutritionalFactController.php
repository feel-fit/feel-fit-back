<?php

namespace App\Http\Controllers\Api\NutritionalFacts;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\NutritionalFact;
use App\Http\Controllers\Controller;

class NutritionalFactController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NutritionalFact::all();

        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NutritionalFact  $nutritionalFact
     * @return \Illuminate\Http\Response
     */
    public function show(NutritionalFact $nutritionalFact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NutritionalFact  $nutritionalFact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NutritionalFact $nutritionalFact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NutritionalFact  $nutritionalFact
     * @return \Illuminate\Http\Response
     */
    public function destroy(NutritionalFact $nutritionalFact)
    {
        //
    }
}
