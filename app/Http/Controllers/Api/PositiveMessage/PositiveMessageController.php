<?php

namespace App\Http\Controllers\Api\PositiveMessage;

use App\Http\Controllers\ApiController;
use App\Http\Resources\PositiveMessage\PositiveMessageCollection;
use Illuminate\Http\Request;
use \App\Models\PositiveMessage;
use Illuminate\Support\Facades\Storage;

class PositiveMessageController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PositiveMessage::all();
        return $this->showAll($data, 200,PositiveMessageCollection::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
          'message'=>'required|string',
          'image' => 'required|image'
        ];
        $this->validate($request,$rules);
        $message = new PositiveMessage($request->all());
        $message->image = $request->file('image')->store('positiveMessage','public');
        $message->save();
        return $this->showOne($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = PositiveMessage::find($id);
        return $this->showOne($message);
    }

    public function latest(){
        $message = PositiveMessage::latest()->first();
        return $this->showOne($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'message'=>'string',
            'image' => 'image'
        ];
        $this->validate($request,$rules);
        $message = PositiveMessage::find($id);
        $imgeAux = $message->image;
        $message->fill($request->all());
        if($request->has('image')){
            Storage::disk('public')->delete($imgeAux);
            $message->image = $request->file('image')->store('positiveMessage','public');
        }
        $message->save();
        return $this->showOne($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Recipe::find($id);
        Storage::disk('public')->delete($message->image);
        $message->delete();
        return $this->showOne($message);
    }
}
