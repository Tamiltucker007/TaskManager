<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Task::class;

    public function definition()
    {
        return [
            'title'        => $this->faker->sentence,
            'description'  => $this->faker->paragraph,
            'due_date'     => now()->addDays(7)->toDateString(),
            'completed_at' => now()->addDays(7)->toDateString()
        ];
    }
}
