<?php

namespace Tests\Feature\Wishlists;

use Tests\TestCase;
use App\Models\Wishlist;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WishlistTest extends TestCase
{
    protected $url = 'v1/wishlists/';
    protected $table = 'wishlists';
    protected $model = Wishlist::class;

    public function testList()
    {
        factory($this->model)->create();
        $data = $this->model::find(1);
        $this->get($this->url, $this->headers())
            ->assertStatus(200)->assertJsonFragment($data->toarray());
    }

    public function testCreate()
    {
        $data = factory($this->model)->make()->toarray();
        $this->post($this->url, $data, $this->headers())
            ->assertStatus(201);
        $this->assertDatabaseHas($this->table, $data);
    }

    public function testFind()
    {
        $data = factory($this->model)->create();
        $this->get($this->url.$data->id, $this->headers())
            ->assertStatus(200);
    }

    public function testUpdate()
    {
        $data_new = factory($this->model)->make()->toarray();
        $data_old = factory($this->model)->create();
        $this->put($this->url.$data_old->id, $data_new, $this->headers())
            ->assertStatus(200);
        $this->assertDatabaseHas($this->table, $data_new);
    }

    public function testDelete()
    {
        $data = factory($this->model)->create();
        $this->delete($this->url.$data->id, [], $this->headers())
            ->assertStatus(200);
        //$this->assertSoftDeleted($this->table, $data->toarray());
    }
}
