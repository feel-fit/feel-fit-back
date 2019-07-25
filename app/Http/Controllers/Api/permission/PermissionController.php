<?php

namespace App\Http\Controllers\Api\permission;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ApiController;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\ValidationException;

class PermissionController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
        $this->middleware('client.credentials')->only(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $permissions = Permission::all();

        return $this->showAll($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|unique:permissions'];

        $this->validate($request, $rules);

        $permission = Permission::create($request->all());

        return $this->successResponse(['data' => $permission->refresh(), 'message' => 'Permission Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Permission  $permission
     * @return JsonResponse
     */
    public function show(Permission $permission)
    {
        return $this->showOne($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Permission  $permission
     * @return JsonResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->fill($request->all());
        if ($permission->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $permission->save();

        return $this->successResponse(['data' => $permission->refresh(), 'message' => 'Permission Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return $this->successResponse(['data' => $permission->refresh(), 'message' => 'Permision Deleted']);
    }
}
