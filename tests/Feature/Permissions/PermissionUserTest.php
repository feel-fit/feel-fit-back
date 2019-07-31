<?php

namespace Tests\Feature\Permissions;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionUserTest extends TestCase
{
    protected $url = 'v1/permissions/';
    protected $table = 'permissions';
    protected $model = Permission::class;

    public function test_permission_user_list()
    {
        $permission = factory($this->model)->create();
        $user = factory(User::class)->create();
        $user->givePermissionTo($permission);
        $response = $this->get($this->url.$permission->id.'/users', $this->headers());
        $response->assertStatus(200);
    }

    public function test_permission_user_attach()
    {
        $permission = factory($this->model)->create();
        $user = factory(User::class)->create();
        $response = $this->put($this->url.$permission->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
    }

    public function test_permission_user_dettach()
    {
        $permission = factory($this->model)->create();
        $user = factory(User::class)->create();
        $user->givePermissionTo($permission);
        $response = $this->delete($this->url.$permission->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
        $response->assertJsonMissing(['data' => [$user->toarray()]]);
    }
}
