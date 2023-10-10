<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions; // Import the trait
use App\Models\User; // Adjust the namespace as per your project structure
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class EloquentQueryTest extends TestCase
{
    use DatabaseTransactions; // Use the trait

    public function testRetrieveUsersInOrder()
    {
        // Create test data using Eloquent
        User::factory()->create(['id' => 2, 'name' => 'John']);
        User::factory()->create(['id' => 1, 'name' => 'Jane']);
        User::factory()->create(['id' => 3, 'name' => 'Doe']);

        // Perform the Eloquent query
        $users = User::orderBy('id')->get();

        // Assertions
        $this->assertCount(3, $users); // Ensure there are 3 users
        $this->assertEquals('Jane', $users[0]->name); // Ensure the first user's name is 'Jane'
        $this->assertEquals('John', $users[1]->name); // Ensure the second user's name is 'John'
        $this->assertEquals('Doe', $users[2]->name); // Ensure the third user's name is 'Doe'
    }
}

