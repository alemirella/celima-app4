<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationIntegrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_database_migration_works()
    {
        $this->assertTrue(Schema::hasTable('users'));
    }
}
