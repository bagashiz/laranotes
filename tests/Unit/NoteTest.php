<?php

namespace Tests\Unit;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    // testNoteBelongsToUser tests that a note belongs to a user
    public function testNoteBelongsToUser()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals($user->id, $note->user->id);
    }
}
