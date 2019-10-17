<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTest extends TestCase
{
    protected $url = 'v1/users/';
    protected $table = 'users';
    protected $model = User::class;

    public function testUsuariosList()
    {
        $user = $this->model::find(1);
        $this->get($this->url, $this->headers())
            ->assertStatus(200);
            //->assertJsonFragment($user->toArray());
    }

    public function testUsuariosPost()
    {
        $data = factory($this->model)->make()->toarray();
        $newdata = array_merge($data, ['password' => 'secret']);
        $this->post($this->url, $newdata, $this->headers())
            ->assertStatus(201)
            ->assertJsonStructure(array_keys($data), $data);
        $this->assertDatabaseHas($this->table, $data);
    }

    public function testUsuariosShow()
    {
        $user = factory($this->model)->create();
        $this->get($this->url.$user->id, $this->headers())
            ->assertStatus(200);
    }

    public function testUsuariosDelete()
    {
        $user = factory($this->model)->create();
        $this->delete($this->url.$user->id, [], $this->headers())
             ->assertStatus(200);
        //$this->assertSoftDeleted($this->table, collect($user)->forget('roles')->toarray());
    }

    public function testUsuariosUpdate()
    {
        $user = factory($this->model)->create();
        $data = factory($this->model)->make()->toarray();
        $this->put($this->url.$user->id, $data, $this->headers())->assertStatus(200);
        $this->assertDatabaseHas($this->table, $data);
    }

    //users con roles
    public function test_usuarios_roles_list()
    {
        $user = factory($this->model)->create();
        $this->get($this->url.$user->id.'/roles', $this->headers())->assertStatus(200);
    }

    public function test_usuarios_roles_attach()
    {
        $role = factory(Role::class)->create();
        $user = factory($this->model)->create();
        $this->put($this->url.$user->id.'/roles/'.$role->id, $this->headers())->assertStatus(200);
    }

    public function test_usuarios_roles_dettach()
    {
        $role = factory(Role::class)->create();
        $user = factory($this->model)->create();
        $this->put($this->url.$user->id.'/roles/'.$role->id, $this->headers())->assertStatus(200);
        $this->delete($this->url.$user->id.'/roles/'.$role->id, $this->headers())
             ->assertStatus(200);
    }
}
