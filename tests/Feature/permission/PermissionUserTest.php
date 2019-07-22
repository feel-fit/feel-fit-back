<?php

namespace Tests\Feature;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class PermissionUserTest extends TestCase
{
    protected $url   = 'api/v1/permissions/';
    protected $table = 'permissions';

    public function test_permission_user_list()
    {
        $permission = factory(Permission::class)->create();
        $user       = factory(User::class)->create();
        $user->givePermissionTo($permission);
        $response = $this->get($this->url.$permission->id.'/users', $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => [$user->toarray()]]);
    }

    public function test_permission_user_attach()
    {
        $permission = factory(Permission::class)->create();
        $user       = factory(User::class)->create();
        $response   = $this->put($this->url.$permission->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
        $response->assertJson(['data' => [$user->toarray()]]);
    }

    public function test_permission_user_dettach()
    {
        $permission = factory(Permission::class)->create();
        $user       = factory(User::class)->create();
        $user->givePermissionTo($permission);
        $response = $this->delete($this->url.$permission->id.'/users/'.$user->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
        $response->assertJsonMissing(['data' => [$user->toarray()]]);
    }
}
