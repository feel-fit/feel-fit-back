<?php

namespace App\Http\Controllers\Api\users;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ApiController;

class UserRoleController extends ApiController
{
    /**
     * @param  User  $user
     * @return JsonResponse
     */
    public function index(User $user)
    {
        $roles = $user->roles;

        return $this->showAll($roles);
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user, Role $role)
    {
        $user->roles()->syncWithoutDetaching([$role->id]);

        return $this->successResponse(['data' => $role->refresh(), 'message' => 'User Updated']);
    }

    /**
     * @param  User  $user
     * @param  Role  $role
     * @return JsonResponse
     */
    public function destroy(User $user, Role $role)
    {
        $user->roles()->detach($role->id);

        return $this->successResponse(['data' => $role->refresh(), 'message' => 'Role Deleted']);
    }
}
