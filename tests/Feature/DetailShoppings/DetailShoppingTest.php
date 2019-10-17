<?php

namespace Tests\Feature\DetailShoppings;

use App\Models\Address;
use App\Models\Discount;
use App\Models\Shipping;
use App\Models\Shopping;
use Tests\TestCase;
use App\Models\DetailShopping;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DetailShoppingTest extends TestCase
{
    protected $url = 'v1/detail-shoppings/';
    protected $table = 'detail_shoppings';
    protected $model = DetailShopping::class;

    public function testList()
    {
        factory(Address::class)->create();
        factory(Shipping::class)->create();
        factory(Discount::class)->create();
        factory(Shopping::class)->create();
        factory($this->model)->create();
        $data = $this->model::find(1);
        $this->get($this->url, $this->headers())
            ->assertStatus(200)->assertJsonFragment($data->toarray());
    }

    public function testCreate()
    {
        factory(Address::class)->create();
        factory(Shipping::class)->create();
        factory(Discount::class)->create();
        factory(Shopping::class)->create();
        $data = factory($this->model)->make()->toarray();
        $this->post($this->url, $data, $this->headers())
            ->assertStatus(201);
        $this->assertDatabaseHas($this->table, $data);
    }

    public function testFind()
    {
        factory(Address::class)->create();
        factory(Shipping::class)->create();
        factory(Discount::class)->create();
        factory(Shopping::class)->create();
        $data = factory($this->model)->create();
        $this->get($this->url.$data->id, $this->headers())
            ->assertStatus(200);
    }

    public function testUpdate()
    {
        factory(Address::class)->create();
        factory(Shipping::class)->create();
        factory(Discount::class)->create();
        factory(Shopping::class)->create();
        $data_new = factory($this->model)->make()->toarray();
        $data_old = factory($this->model)->create();
        $this->put($this->url.$data_old->id, $data_new, $this->headers())
            ->assertStatus(200);
        $this->assertDatabaseHas($this->table, $data_new);
    }

    public function testDelete()
    {
        factory(Address::class)->create();
        factory(Shipping::class)->create();
        factory(Discount::class)->create();
        factory(Shopping::class)->create();
        $data = factory($this->model)->create();
        $this->delete($this->url.$data->id, [], $this->headers())
            ->assertStatus(200);
        //$this->assertSoftDeleted($this->table, $data->toarray());
    }
}
