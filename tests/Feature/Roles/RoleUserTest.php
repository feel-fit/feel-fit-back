<?php

namespace Tests\Feature\Roles;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleUserTest extends TestCase
{
    protected $url = 'v1/roles/';
    protected $table = 'roles';
    protected $model = Role::class;

    public function test_role_user_list()
    {
        $role = factory($this->model)->create();
        $user = factory(User::class)->create();
        $user->syncRoles($role);
        $response = $this->get($this->url.$role->id.'/users', $this->headers());
        $response->assertStatus(200);
    }

    public function test_role_user_attach()
    {
        $role = factory($this->model)->create();
        $user = factory(User::class)->create();
        $response = $this->put($this->url.$role->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
    }

    public function test_role_user_dettach()
    {
        $role = factory($this->model)->create();
        $user = factory(User::class)->create();
        $user->syncRoles($role);
        $response = $this->delete($this->url.$role->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
        $response->assertJsonMissing(['data' => [$user->toarray()]]);
    }
}
