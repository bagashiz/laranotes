<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    // testUserHasManyNotes tests that a user has many notes
    public function testUserHasManyNotes()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(User::class, $note->user);
        $this->assertEquals($user->id, $note->user->id);
    }

    // testFilterByTag tests that a user can filter notes by tag
    public function testFilterByTag()
    {
        $user = User::factory()->create();

        $note1 = Note::factory()->create([
            'user_id' => $user->id,
            'tags' => implode(',', ['tag1, tag2'])
        ]);

        $note2 = Note::factory()->create([
            'user_id' => $user->id,
            'tags' => implode(',', ['tag1, tag3'])
        ]);

        $note3 = Note::factory()->create([
            'user_id' => $user->id,
            'tags' => implode(',', ['tag2, tag3'])
        ]);

        $filteredNotes = Note::filter(['tag' => 'tag1'])->get();

        $this->assertTrue($filteredNotes->contains($note1));
        $this->assertTrue($filteredNotes->contains($note2));
        $this->assertFalse($filteredNotes->contains($note3));
    }

    // testFilterBySearch tests that a user can filter notes by search
    public function testFilterBySearch()
    {
        $user = User::factory()->create();

        $note1 = Note::factory()->create([
            'user_id' => $user->id,
            'title' => 'My first note',
            'subtitle' => 'Laravel is awesome',
        ]);

        $note2 = Note::factory()->create([
            'user_id' => $user->id,
            'title' => 'My second note',
            'subtitle' => 'PHP is fun',
        ]);

        $filteredNotes = Note::filter(['search' => 'laravel'])->get();

        $this->assertTrue($filteredNotes->contains($note1));
        $this->assertFalse($filteredNotes->contains($note2));
    }
}
