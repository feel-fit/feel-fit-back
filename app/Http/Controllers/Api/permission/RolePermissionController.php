<?php

namespace App\Http\Controllers\Api\permission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ApiController;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Role $role)
    {
        $permissions = $role->permissions;

        return $this->showAll($permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Role  $role
     * @param  Permission  $permission
     * @return JsonResponse
     */
    public function update(Request $request, Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            return $this->errorResponse('Role already have this permission', 422);
        }

        $role->givePermissionTo($permission);

        return $this->successResponse(['data' => $permission->refresh(), 'message' => 'Role Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @param  Permission  $permission
     * @return JsonResponse
     */
    public function destroy(Role $role, Permission $permission)
    {
        if (!$role->hasPermissionTo($permission)) {
            return $this->errorResponse('Role don`t have this permission', 422);
        }

        $role->revokePermissionTo($permission);

        return $this->successResponse(['data' => $permission->refresh(), 'message' => 'Permission Deleted']);
    }
}
