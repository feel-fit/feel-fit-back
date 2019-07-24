<?php

namespace Tests\Feature\Roles;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleUserTest extends TestCase
{
    protected $url = 'api/v1/roles/';
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

    /* public function test_role_user_list()
     {
         $role = factory(Role::class)->create();
         $user = factory(User::class)->create();
         $user->syncRoles($role);
         $response = $this->get($this->url.$role->id.'/users', $this->headers());
         $response->assertStatus(200);
         $response->assertJson(['data' => [$user->toarray()]]);
     }

     public function test_role_user_attach()
     {
         $role     = factory(Role::class)->create();
         $user     = factory(User::class)->create();
         $response = $this->put($this->url.$role->id.'/users/'.$user->id, [], $this->headers());
         $response->assertStatus(200);
         $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
         $response->assertJson(['data' => [$user->toarray()]]);
     }

     public function test_role_user_dettach()
     {
         $role = factory(Role::class)->create();
         $user = factory(User::class)->create();
         $user->syncRoles($role);
         $response = $this->delete($this->url.$role->id.'/users/'.$user->id, [], $this->headers());
         $response->assertStatus(200);
         $response->assertJsonStructure(array_keys($user->toarray()), $user->toarray());
         $response->assertJsonMissing(['data' => [$user->toarray()]]);
     }*/
}
