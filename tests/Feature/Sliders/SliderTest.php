<?php

namespace Tests\Feature\Sliders;

use Tests\TestCase;
use App\Models\Slider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SliderTest extends TestCase
{
    protected $url = 'v1/sliders/';
    protected $table = 'sliders';
    protected $model = Slider::class;

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
        $this->post($this->url, $data, $this->headers())->dump()
            ->assertStatus(201);
        //$this->assertDatabaseHas($this->table, $data);
    }

    public function testFind()
    {
        $data = factory($this->model)->create();
        $this->get($this->url.$data->id, $this->headers())
            ->assertStatus(200);
    }



    public function testDelete()
    {
        $data = factory($this->model)->create();
        $this->delete($this->url.$data->id, [], $this->headers())
            ->assertStatus(200);
        //$this->assertSoftDeleted($this->table, $data->toarray());
    }
}
