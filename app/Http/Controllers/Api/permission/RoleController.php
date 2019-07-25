<?php

namespace App\Http\Controllers\Api\permission;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ApiController;
use Illuminate\Validation\ValidationException;

class RoleController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show', 'update', 'store', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $roles = Role::all();

        return $this->showAll($roles);
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
        $rules = ['name' => 'required|unique:roles'];

        $this->validate($request, $rules);

        $role = Role::create($request->all());

        return $this->successResponse(['data' => $role->refresh(), 'message' => 'Role Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Role  $role
     *
     * @return JsonResponse
     */
    public function show(Role $role)
    {
        return $this->showOne($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Role  $role
     *
     * @return JsonResponse
     */
    public function update(Request $request, Role $role)
    {
        $role->fill($request->all());
        if ($role->isClean()) {
            return $this->errorResponse('At least one different value must be specified to update', 422);
        }

        $role->save();

        return $this->successResponse(['data' => $role->refresh(), 'message' => 'Role Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return $this->successResponse(['data' => $role->refresh(), 'message' => 'Role Deleted']);
    }
}
