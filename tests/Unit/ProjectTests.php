<?php

namespace Tests\Unit;

use App\Issue;
use App\Project;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class ProjectTests extends TestCase
{
    public function test_project_fillable_attributes()
    {
        $project = new Project();
        $this->assertEquals(
            ['project_name', 'description', 'users_assign'],
            $project->getFillable()
        );
    }

    public function test_project_belongs_to_user()
    {
        $project = new Project();
        $this->assertInstanceOf(BelongsTo::class, $project->user());
    }

    public function test_project_belongs_to_many_issues()
    {
        $project = new Project();
        $this->assertInstanceOf(BelongsToMany::class, $project->issue());
    }

    public function test_project_can_be_created_with_factory()
    {
        $project = Project::factory()->create();
        $this->assertDatabaseHas('projects', ['id' => $project->id]);
    }

    public function test_project_user_relationship()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $project->user);
        $this->assertEquals($user->id, $project->user->id);
    }

    public function test_project_can_have_issues()
    {
        $project = Project::factory()->create();
        $issue = Issue::factory()->create();

        $project->issue()->attach($issue->id);

        $this->assertTrue($project->issue->contains($issue));
    }

    public function test_users_assign_can_store_json()
    {
        $project = Project::factory()->create([
            'users_assign' => json_encode(['user_1', 'user_2'])
        ]);

        $this->assertJson($project->users_assign);
    }



}
