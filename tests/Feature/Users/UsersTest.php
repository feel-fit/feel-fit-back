<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;

class UsersTest extends TestCase
{
    protected $url = 'v1/users/';
    protected $table = 'users';

    public function testUsuariosList()
    {
        $user = User::find(1);
        $this->get($this->url, $this->headers())
            ->assertStatus(200)
            ->assertJsonFragment($user->toArray());
    }

    public function testUsuariosPost()
    {
        $data = factory(User::class)->make()->toarray();
        $newdata = array_merge($data, ['password' => 'secret']);
        $response = $this->post($this->url, $newdata, $this->headers())
            ->assertStatus(201)
            ->assertJsonStructure(array_keys($data), $data);
        $response->dump();
        $this->assertDatabaseHas($this->table,$data);
    }

    /*

    public function testUsuariosShow()
    {
        $user = factory(User::class)->create();
        $this->get($this->url . $user->id, $this->headers())
            ->assertStatus(200)
            ->assertJsonFragment($user->toarray());
    }

    public function testUsuariosDelete()
    {
        $user = factory(User::class)->create();
        $this->delete($this->url . $user->id, [], $this->headers())
             ->assertStatus(200)
             ->assertJsonFragment($user->toarray());
        $this->assertSoftDeleted($this->table, $user->toarray());
    }

    public function testUsuariosUpdate()
    {
        $user = factory(User::class)->create();
        $data = factory(User::class)->make()->toarray();
        $this->put($this->url . $user->id, $data, $this->headers())->assertStatus(200)->assertJsonFragment($data);
        $this->assertDatabaseHas($this->table, $data);
    }

    //users con roles
    public function test_usuarios_roles_list()
    {
        $user = factory(User::class)->create();
        $this->get($this->url . $user->id . '/roles', $this->headers())->assertStatus(200);
    }

    public function test_usuarios_roles_attach()
    {
        $role = factory(\Spatie\Permission\Models\Role::class)->create();
        $user = factory(User::class)->create();
        $this->put($this->url . $user->id . '/roles/' . $role->id, $this->headers())->assertStatus(200);
    }

    public function test_usuarios_roles_dettach()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->create();
        $this->put($this->url . $user->id . '/roles/' . $role->id, $this->headers())->assertStatus(200);
        $this->delete($this->url . $user->id . '/roles/' . $role->id, $this->headers())
             ->assertStatus(200)
             ->assertJsonMissing($role->toarray());
    }*/
}
