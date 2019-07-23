<?php

namespace Tests\Feature\Permissions;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PermissionRoleTest extends TestCase
{
    protected $url   = 'v1/permissions/';
    protected $table = 'permissions';


    public function testExample()
    {
        $this->get($this->url, $this->headers())
            ->assertStatus(200);
    }

   /* public function test_permission_role_list()
    {
        $permission = factory(Permission::class)->create();
        $role       = factory(Role::class)->create();
        $permission->syncRoles($role);
        $response = $this->get($this->url.$permission->id.'/roles', $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => [$role->toarray()]]);
    }

    public function test_permission_role_attach()
    {
        $permission = factory(Permission::class)->create();
        $role       = factory(Role::class)->create();
        $response   = $this->put($this->url.$permission->id.'/roles/'.$role->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($role->toarray()), $role->toarray());
        $response->assertJson(['data' => [$role->toarray()]]);
    }

    public function test_permission_role_dettach()
    {
        $permission = factory(Permission::class)->create();
        $role       = factory(Role::class)->create();
        $permission->syncRoles($role);
        $response = $this->delete($this->url.$permission->id.'/roles/'.$role->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($role->toarray()), $role->toarray());
        $response->assertJsonMissing(['data' => [$role->toarray()]]);
    }*/
}
