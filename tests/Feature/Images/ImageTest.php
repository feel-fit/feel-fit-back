<?php

namespace Tests\Feature\Images;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageTest extends TestCase
{
    protected $url = 'v1/images/';
    protected $table = 'images';
    protected $model = Image::class;

    public function testList()
    {
        $data = factory($this->model)->make()->toarray();
        $this->post($this->url, $data, $this->headers())->dump()
            ->assertStatus(201);
        $data = $this->model::find(1);
        $this->get($this->url, $this->headers())
            ->assertStatus(200);
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
        $data = factory($this->model)->make()->toarray();
        $this->post($this->url, $data, $this->headers())->dump()
            ->assertStatus(201);
        $this->get($this->url.'1', $this->headers())
            ->assertStatus(200);
    }



    public function testDelete()
    {
        $data = factory($this->model)->make()->toarray();
        $this->post($this->url, $data, $this->headers())->dump()
            ->assertStatus(201);
        $this->delete($this->url.'1', [], $this->headers())
            ->assertStatus(200);
        //$this->assertSoftDeleted($this->table, $data->toarray());
    }
}
