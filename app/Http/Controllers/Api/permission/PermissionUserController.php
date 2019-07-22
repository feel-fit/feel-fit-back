<?php

namespace App\Http\Controllers\Api\permission;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Permission $permission)
    {
        $users = $permission->users;

        return $this->showAll($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Permission $permission
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, Permission $permission, User $user)
    {
        if ($user->hasPermissionTo($permission)) {
            return $this->errorResponse('permission already have this User', 422);
        }

        $user->givePermissionTo($permission);

        return $this->successResponse(['data' => $permission->refresh(), 'message' => 'User Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(Permission $permission, User $user)
    {
        if (!$user->hasPermissionTo($permission)) {
            return $this->errorResponse('permission don`t have this User', 422);
        }

        $user->revokePermissionTo($permission);
        return $this->successResponse(['data' => $user->refresh(), 'message' => 'User Delete']);
    }
}
