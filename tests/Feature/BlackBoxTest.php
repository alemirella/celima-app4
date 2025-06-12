<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlackBoxTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_page_shows_expected_text()
    {
        $response = $this->get('/login');
        $response->assertSee('Correo');
    }

}
