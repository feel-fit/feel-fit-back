<?php

namespace Tests\Feature;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    protected $url   = 'api/v1/roles/';
    protected $table = 'roles';

    public function test_role_permission_list()
    {
        $role       = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();
        $permission->syncRoles($role);
        $response = $this->get($this->url.$role->id.'/permissions', $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => [$permission->toarray()]]);
    }

    public function test_role_permission_attach()
    {
        $role       = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();
        $response   = $this->put($this->url.$role->id.'/permissions/'.$permission->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($permission->toarray()), $permission->toarray());
        $response->assertJson(['data' => [$permission->toarray()]]);
    }

    public function test_role_permission_dettach()
    {
        $role       = factory(Role::class)->create();
        $permission = factory(Permission::class)->create();
        $permission->syncRoles($role);
        $response = $this->delete($this->url.$role->id.'/permissions/'.$permission->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($permission->toarray()), $permission->toarray());
        $response->assertJsonMissing(['data' => [$permission->toarray()]]);
    }
}
