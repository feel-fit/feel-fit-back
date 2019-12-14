<?php

namespace App\Http\Controllers\Api\Subscribe;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Subscribe\SubscribeCollection;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subscribe::all();
        return $this->showAll($data, 200, SubscribeCollection::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:subscribes,email',
        ];

        $this->validate($request, $rules);
        $subscribe = Subscribe::create($request->all());

        return $this->showOne($subscribe, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        return $this->showOne($subscribe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribe $subscribe)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $this->validate($request, $rules);

        $subscribe->fill($request->all());
        $subscribe->save();
        return $this->showOne($subscribe, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
    }
}
