<?php

namespace App\Http\Controllers\Api\permission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ApiController;
use Spatie\Permission\Models\Permission;

class PermissionRoleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Permission  $permission
     * @return JsonResponse
     */
    public function index(Permission $permission)
    {
        $roles = $permission->roles;

        return $this->showAll($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Permission  $permission
     * @param  Role  $role
     * @return JsonResponse
     */
    public function update(Request $request, Permission $permission, Role $role)
    {
        if ($role->hasPermissionTo($permission)) {
            return $this->errorResponse('permission already have this Role', 422);
        }

        $role->givePermissionTo($permission);

        return $this->showOne($permission->refresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @param  Role  $role
     * @return JsonResponse
     */
    public function destroy(Permission $permission, Role $role)
    {
        if (!$role->hasPermissionTo($permission)) {
            return $this->errorResponse('permission don`t have this Role', 422);
        }

        $role->revokePermissionTo($permission);

        return $this->successResponse(['data' => $role->refresh(), 'message' => 'Role Deleted']);
    }
}
