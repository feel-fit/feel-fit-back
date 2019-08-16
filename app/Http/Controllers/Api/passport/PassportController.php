<?php

namespace App\Http\Controllers\Api\passport;

use App\Models\User;
use Laravel\Passport\Token;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;

class PassportController extends ApiController
{
    public function __construct()
    {
        //$this->middleware('client.credentials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];

        $this->validate($request, $rules);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => true], true)) {
            $token = $this->ObtenerToken($request);
            if (!isset($token->error)) {
                return $this->showOne($token);
            }
        }

        return $this->errorResponse('Unauthorized: Access is denied due to invalid credentials.', 401);

    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
        $this->validate($request, $rules);

        $user = User::create($request->all());

        return $this->showOne($this->ObtenerToken($request));
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function facebook(Request $request)
    {
        if ($request->has('email')) {
            if ($user = User::where('email', $request->email)->first()) {
                $user->update(['facebook_id' => $request->id, 'avatar' => $request->picture['data']['url']]);
            } else {
                //crear usuario
                $user = User::create($request->all());
                $user->update(['facebook_id' => $request->id, 'avatar' => $request->picture['data']['url']]);
            }
        } elseif ($request->has('userID')) {
            if ($user = User::where('facebook_id', $request->userID)->first()) {
            } else {
                return $this->errorResponse('Error in facebook login');
            }
        }

        $token = $user->createToken($user->email)->accessToken;


        return $this->successResponse(['data' => ['access_token' => $token]]);
    }

    /**
     * @param  Request  $request
     * @return Token
     */
    public function ObtenerToken(Request $request)
    {
        $request->request->add([
            'client_id' => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type' => 'password',
            'username' => $request->email,
            'password' => $request->password,
        ]);

        $response = Route::dispatch($request->create('/oauth/token', 'POST', $request->all()));

        $token = (array) json_decode($response->getContent());

        return new Token($token);
    }

    /**
     * @return JsonResponse
     */
    public function checkToken()
    {
        return $this->successResponse(['token' => 'Ok']);
    }
}
