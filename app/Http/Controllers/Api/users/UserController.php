<?php

namespace App\Http\Controllers\Api\users;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;

class UserController extends ApiController
{
    public function __construct()
    {
        /* $this->middleware('auth:api')->only(['me', 'store', 'delete']);*/
        $this->middleware('client.credentials');
        //parent::__construct();
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $users = User::all();

        return $this->showAll($users);
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'numeric',
            'status' => 'boolean',
        ];
        $this->validate($request, $rules);
        $user = User::create($request->all());

        return $this->showOne($user, 201);
    }

    /**
     * @param  User  $user
     *
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * @return JsonResponse
     */
    public function me()
    {
        return $this->showOne(auth()->user());
    }

    /**
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function checkEmail(Request $request)
    {
        $rules = ['email' => 'required|email|unique:users'];
        $this->validate($request, $rules);

        return $this->successResponse(['message' => 'Email Unique']);
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     *
     * @return JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        if ($user->isClean()) {
            return $this->errorNoClean();
        }
        $user->save();

        return $this->showOne($user);
    }

    /**
     * @param  User  $user
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->showOne($user->refresh());
    }
}
