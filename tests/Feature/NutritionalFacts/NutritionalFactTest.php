<?php

namespace Tests\Feature\NutritionalFacts;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NutritionalFactTest extends TestCase
{
    protected $url = 'v1/nutritional-facts/';
    protected $table = 'nutritional-facts';

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
