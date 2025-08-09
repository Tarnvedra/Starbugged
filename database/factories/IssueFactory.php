<?php

namespace Database\Factories;

use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
    protected $model = Issue::class;

    public function definition(): array
    {
        return [
            'project_id' => Project::factory(), // Creates a related Project
            'user_id' => User::factory(),       // Creates a related User
            'os' => $this->faker->randomElement(['Windows', 'macOS', 'Linux', 'Android', 'iOS']),
            'risk' => $this->faker->randomElement(['Low', 'Medium', 'High', 'Critical']),
            'issue' => $this->faker->sentence(6),
            'description' => $this->faker->paragraphs(2, true),
            'assignment' => $this->faker->name,
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Resolved', 'Closed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

