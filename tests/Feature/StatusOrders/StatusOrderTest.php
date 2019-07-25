<?php

namespace Tests\Feature\StatusOrders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusOrderTest extends TestCase
{
    protected $url = 'v1/status-orders/';
    protected $table = 'status-orders';

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
}
