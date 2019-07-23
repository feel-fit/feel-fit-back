<?php

namespace Tests\Feature\Payments;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
    protected $url   = 'v1/addresses/';
    protected $table = 'addresses';
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
