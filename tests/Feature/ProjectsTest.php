<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectsTest extends TestCase
{

    public function test_can_an_authenticated_user_create_a_project()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'project_name' => $project->project_name,
            'description' => $project->description,
        ]);

    }

    public function test_can_an_authenticated_user_view_a_project()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $project = Project::factory()->create(['user_id' => $user->id]);


    }


}
