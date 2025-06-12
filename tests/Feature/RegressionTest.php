<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegressionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_existing_route_still_works()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

}
