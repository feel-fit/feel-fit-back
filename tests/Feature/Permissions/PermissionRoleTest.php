<?php

namespace Tests\Feature\Permissions;

use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleTest extends TestCase
{
    protected $url = 'v1/permissions/';
    protected $table = 'permissions';
    protected $model = Permission::class;



     public function test_permission_role_list()
     {
         $permission = factory($this->model)->create();
         $role       = factory(Role::class)->create();
         $permission->syncRoles($role);
         $response = $this->get($this->url.$permission->id.'/roles', $this->headers());
         $response->assertStatus(200);
         $response->assertJson(['data' => [$role->toarray()]]);
     }

     public function test_permission_role_attach()
     {
         $permission = factory($this->model)->create();
         $role       = factory(Role::class)->create();
         $response   = $this->put($this->url.$permission->id.'/roles/'.$role->id, [], $this->headers());
         $response->assertStatus(200);

     }

     public function test_permission_role_dettach()
     {
         $permission = factory($this->model)->create();
         $role       = factory(Role::class)->create();
         $permission->syncRoles($role);
         $response = $this->delete($this->url.$permission->id.'/roles/'.$role->id, [], $this->headers());
         $response->assertStatus(200);
         $response->assertJsonStructure(array_keys($role->toarray()), $role->toarray());
     }
}
