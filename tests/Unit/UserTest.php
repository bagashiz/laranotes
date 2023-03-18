<?php

namespace Tests\Unit;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    // testUserHasManyNotes tests that a user has many notes
    public function testUserHasManyNotes()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals($user->id, $note->user->id);
    }
}
