<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use DatabaseMigrations;

    // setUp seed the database before each test
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    // testDatabaseMigrationAndSeeding test the database migration and seeding
    public function testDatabaseMigrationAndSeeding()
    {
        // assert that the users table has 1 record
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'username' => 'test',
        ]);

        // assert that the notes table has 8 records
        $this->assertDatabaseCount('notes', 8);
        $this->assertDatabaseHas('notes', [
            'user_id' => 1,
        ]);
    }
}
