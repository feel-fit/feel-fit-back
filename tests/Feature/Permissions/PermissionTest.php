<?php

namespace Tests\Feature\Permissions;

use Tests\TestCase;
use Spatie\Permission\Models\Permission;

class PermissionTest extends TestCase
{
    protected $url = 'v1/permissions/';
    protected $table = 'permissions';
    protected $model = Permission::class;




    public function test_list_permission()
    {
        $data     = factory($this->model)->create();
        $response = $this->get($this->url, $this->headers());
        $response->assertStatus(200);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_show_permission()
    {
        $data     = factory($this->model)->create();
        $response = $this->get($this->url.$data->id, $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_create_permission()
    {
        $data     = factory($this->model)->make();
        $response = $this->post($this->url, $data->toarray(), $this->headers());
        $response->assertStatus(201);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
    }

    public function test_update_permission()
    {
        $old      = factory($this->model)->create();
        $data     = factory($this->model)->make();
        $response = $this->put($this->url.$old->id, $data->toarray(), $this->headers());
        $response->assertStatus(200);
        $response->assertJsonFragment($data->toarray());
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseHas($this->table, $data->toarray());
        $this->assertDatabaseMissing($this->table, $old->toarray());
    }

    public function test_update_empty()
    {
        $data     = factory($this->model)->create();
        $response = $this->put($this->url.$data->id, [], $this->headers());
        $response->assertStatus(422);
    }

    public function test_delete_permission()
    {
        $data     = factory($this->model)->create();
        $response = $this->delete($this->url.$data->id, [], $this->headers());
        $response->assertStatus(200);
        $response->assertJson(['data' => $data->toarray()]);
        $response->assertJsonStructure(array_keys($data->toarray()), $data->toarray());
        $this->assertDatabaseMissing($this->table, $data->toarray());
    }
}
