<?php

namespace Tests\Feature;

use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class NoteControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    // testAuthUserCreateNote tests the creation of a note by a guest user
    public function testAuthUserCreateNote()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $title = $this->faker->sentence(3);
        $subtitle = $this->faker->sentence(5);
        $tags = implode(',', $this->faker->words(3));
        $description = $this->faker->paragraph();

        $response = $this->post('/notes', [
            'title' => $title,
            'subtitle' => $subtitle,
            'tags' => $tags,
            'description' => $description
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('notes', [
            'user_id' => $user->id,
            'title' => $title,
            'subtitle' => $subtitle,
            'tags' => $tags,
            'description' => $description,
        ]);
    }

    // testAuthUserViewNote tests the viewing of a note by an authenticated user
    public function testAuthUserViewNote()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        Auth::login($user);

        $response = $this->get('/notes/' . $note->id);

        $response->assertStatus(200);
        $response->assertViewIs('notes.show');
        $response->assertViewHas('note');
    }

    // testGuestUserViewNote tests the viewing of a note by a guest user
    public function testGuestUserViewNote()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->get('/notes/' . $note->id);

        $response->assertRedirect('/login');
    }

    // testAuthUserEditNote tests the editing of a note by an authenticated user
    public function testAuthUserEditNote()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);
        Auth::login($user);

        $title = $this->faker->sentence(3);
        $subtitle = $this->faker->sentence(5);
        $tags = implode(',', $this->faker->words(3));
        $description = $this->faker->paragraph();

        $response = $this->patch('/notes/' . $note->id, [
            'title' => $title,
            'subtitle' => $subtitle,
            'tags' => $tags,
            'description' => $description
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('notes', [
            'id' => $note->id,
            'user_id' => $user->id,
            'title' => $title,
            'subtitle' => $subtitle,
            'tags' => $tags,
            'description' => $description,
        ]);
    }

    // testGuestUserEditNote tests the editing of a note by a guest user
    public function testGuestUserEditNote()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $title = $this->faker->sentence(3);
        $subtitle = $this->faker->sentence(5);
        $tags = implode(',', $this->faker->words(3));
        $description = $this->faker->paragraph();

        $response = $this->patch('/notes/' . $note->id, [
            'title' => $title,
            'subtitle' => $subtitle,
            'tags' => $tags,
            'description' => $description
        ]);

        $response->assertRedirect('/login');
        $this->assertDatabaseMissing('notes', [
            'id' => $note->id,
            'user_id' => $user->id,
            'title' => $title,
            'subtitle' => $subtitle,
            'tags' => $tags,
            'description' => $description,
        ]);
    }

    // testAuthUserDeleteNote tests the deletion of a note by an authenticated user
    public function testAuthUserDeleteNote()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);
        Auth::login($user);

        $response = $this->delete('/notes/' . $note->id);

        $response->assertRedirect('/');
        $this->assertDatabaseMissing('notes', [
            'id' => $note->id
        ]);
    }

    // testGuestUserDeleteNote tests the deletion of a note by a guest user
    public function testGuestUserDeleteNote()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->delete('/notes/' . $note->id);

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('notes', [
            'id' => $note->id
        ]);
    }
}
