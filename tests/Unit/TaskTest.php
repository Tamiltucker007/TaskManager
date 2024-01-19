<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_get_all_tasks()
    {
        // create a user for authentication
        $user = User::factory()->create();

        // create a tasks
        Task::factory()->count(3)->create();

        // authenticate the user
        $this->actingAs($user);

        $response = $this->get(route('tasks.index'));

        // Assertion
        $response->assertStatus(200)
                ->assertViewIs('tasks.index');
    }


    public function test_create_task()
    {
        // create a user for authentication
        $user =  User::factory()->create();

        $formData = [
            'title'         => $this->faker->sentence,
            'description'   => $this->faker->paragraph,
            'due_date'      => now()->addDays(7)->toDateString(),
            'completed_at'  => now()->addDays(7)->toDateString()
        ];

        $this->actingAs($user);

        $response = $this->post(route('tasks.store'), $formData);

        $response->assertRedirect(route('tasks.index'));

    }

    public function test_update_task()
    {
        // create a user for authentication
        $user = User::factory()->create();

        // Create a task
        $task = Task::factory()->create();

        // Authenticate the user
        $this->actingAs($user);

        // Updated data
        $updatedData = [
            'title'         => $this->faker->sentence,
            'description'   => $this->faker->paragraph,
            'due_date'      => now()->addDays(14)->toDateString(),
            'completed_at'  => now()->addDays(14)->toDateString(),
        ];

        // Update the task
        $response = $this->put(route('tasks.update', $task->id), $updatedData);

        // Assert that the task was updated and redirected to the index
        $response->assertRedirect(route('tasks.index'));

        // Assert that the task in the database matches the updated data
        $this->assertDatabaseHas('tasks', $updatedData);
    }


    public function test_delete_task()
    {
        // create a user for authentication
        $user = User::factory()->create();

        // create a task
        $task = Task::factory()->create();

        // authenticate the user
        $this->actingAs($user);

        // delete the task
        $response = $this->delete(route('tasks.destroy', $task->id));

        $response->assertRedirect(route('tasks.index'));
    }

}
