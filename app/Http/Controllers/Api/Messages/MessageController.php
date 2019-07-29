<?php

namespace App\Http\Controllers\Api\Messages;

use App\Http\Controllers\ApiController;
use App\Models\Message;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class MessageController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = Message::all();

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
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'user_id' => 'numeric|nullable',
        ];
        $this->validate($request, $rules);
        $data = Message::create($request->all());

        return $this->showOne($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Message  $message
     * @return JsonResponse
     */
    public function show(Message $message)
    {
        return $this->showOne($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Message  $message
     * @return JsonResponse
     */
    public function update(Request $request, Message $message)
    {
        $message->fill($request->all());
        if ($message->isClean()) {
            return $this->errorNoClean();
        }
        $message->save();

        return $this->showOne($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Message  $message
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return $this->showOne($message);
    }
}
