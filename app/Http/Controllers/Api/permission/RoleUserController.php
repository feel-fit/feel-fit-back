<?php

namespace App\Http\Controllers\Api\permission;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ApiController;

class RoleUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Role $role)
    {
        $users = $role->users;

        return $this->showAll($users,200,UserCollection::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Role  $role
     * @param  User  $user
     * @return JsonResponse
     */
    public function update(Request $request, Role $role, User $user)
    {
        if ($user->hasRole($role)) {
            return $this->errorResponse('Role already has this User', 422);
        }
        $user->syncRoles($role);

        return $this->showOne($user->refresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(Role $role, User $user)
    {
        if (! $user->hasRole($role)) {
            return $this->errorResponse('Role don`t have this User', 422);
        }
        $user->removeRole($role);

        return $this->showOne($user->refresh());
    }
}
