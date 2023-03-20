<?php

namespace Tests\Unit;

use Database\Factories\UserFactory;
use PHPUnit\Framework\TestCase;

class UserFactoryTest extends TestCase
{
    // testFactoryCreatesUser tests that the UserFactory creates a user with the correct keys and types
    public function testFactoryCreatesUser()
    {
        $factory = new UserFactory();

        $user = $factory->definition();

        // assert that the user has the correct keys
        $this->assertArrayHasKey('username', $user);
        $this->assertArrayHasKey('password', $user);

        // assert that the user has the correct types
        $this->assertIsString($user['username']);
        $this->assertIsString($user['password']);
    }
}
