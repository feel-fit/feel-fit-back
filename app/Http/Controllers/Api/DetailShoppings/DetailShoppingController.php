<?php

namespace App\Http\Controllers\Api\DetailShoppings;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\DetailShopping;
use App\Http\Controllers\Controller;

class DetailShoppingController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DetailShopping::all();

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
     * @param  \App\Models\DetailShopping  $detailShopping
     * @return \Illuminate\Http\Response
     */
    public function show(DetailShopping $detailShopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailShopping  $detailShopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailShopping $detailShopping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailShopping  $detailShopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailShopping $detailShopping)
    {
        //
    }
}
