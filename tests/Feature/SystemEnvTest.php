<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemEnvTest extends TestCase
{
    /**
     * A basic feature test example.
     */
        public function test_env_loaded()
    {
        $this->assertNotEmpty(env('APP_NAME'));
    }
}
