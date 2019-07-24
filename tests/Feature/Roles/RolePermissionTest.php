<?php

namespace Tests\Feature\Roles;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionTest extends TestCase
{
    protected $url = 'v1/roles/';
    protected $table = 'roles';

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get($this->url, $this->headers())
            ->assertStatus(200);
    }

    /* public function test_role_permission_list()
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
     }*/
}
