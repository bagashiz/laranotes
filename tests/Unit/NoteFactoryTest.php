<?php

namespace Tests\Unit;

use Database\Factories\NoteFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class NoteFactoryTest extends TestCase
{
    use RefreshDatabase;

    // testFactoryCreatesNote tests that the NoteFactory creates a note with the correct keys, types, and values
    public function testFactoryCreatesNote()
    {
        $factory = new NoteFactory();

        $note = $factory->definition();

        // assert that the note has the correct keys
        $this->assertArrayHasKey('title', $note);
        $this->assertArrayHasKey('subtitle', $note);
        $this->assertArrayHasKey('tags', $note);
        $this->assertArrayHasKey('description', $note);

        // assert that the note has the correct types
        $this->assertIsString($note['title']);
        $this->assertIsString($note['subtitle']);
        $this->assertIsString($note['tags']);
        $this->assertIsString($note['description']);

        // assert that the note has the correct values
        $tags = explode(',', $note['tags']);
        $this->assertGreaterThanOrEqual(1, count($tags));
        $this->assertIsString($tags[0]);
    }
}
