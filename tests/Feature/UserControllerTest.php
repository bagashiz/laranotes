<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    // testRegisterNewUser tests the registration of a new user
    public function testRegisterNewUser()
    {
        $username = $this->faker->userName;
        $password = $this->faker->password(8);

        $response = $this->post('/users', [
            'username' => $username,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', [
            'username' => $username,
        ]);
        $this->assertAuthenticated();
    }

    // testAuthUserRegisterNewUser tests the registration of a new user by an authenticated user
    public function testAuthUserRegisterNewUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $username = $this->faker->userName;
        $password = $this->faker->password(8);

        $response = $this->post('/users', [
            'username' => $username,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseMissing('users', [
            'username' => $username,
        ]);
    }

    // testAuthUserLoginAndLogout tests the login and logout of a user
    public function testAuthUserLoginAndLogout()
    {
        $username = $this->faker->userName;
        $password = $this->faker->password(8);

        $user = User::factory()->create([
            'username' => $username,
            'password' => bcrypt($password),
        ]);

        // Login the user
        $response = $this->post('/users/auth', [
            'username' => $username,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

        // Logout the user
        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    // testGuestUserLoginAndLogout tests the login and logout of a guest user
    public function testGuestUserLoginAndLogout()
    {
        $username = $this->faker->userName;
        $password = $this->faker->password(8);

        // Login
        $response = $this->post('/users/auth', [
            'username' => $username,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertGuest();

        // Logout
        $response = $this->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

}
