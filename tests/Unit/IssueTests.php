<?php

namespace Tests\Unit;

use App\Models\Issue;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class IssueTests extends TestCase
{
    public function test_issue_belongs_to_project()
    {
        $issue = new Issue();
        $this->assertInstanceOf(BelongsTo::class, $issue->project());
    }

    public function test_issue_belongs_to_user()
    {
        $issue = new Issue();
        $this->assertInstanceOf(BelongsTo::class, $issue->user());
    }

    public function test_issue_belongs_to_many_watchers()
    {
        $issue = new Issue();
        $this->assertInstanceOf(BelongsToMany::class, $issue->watchers());
    }

    public function test_issue_has_many_comments()
    {
        $issue = new Issue();
        $this->assertInstanceOf(HasMany::class, $issue->comments());
    }

    public function test_issue_can_be_created_with_factory()
    {
        $issue = Issue::factory()->create();
        $this->assertDatabaseHas('issues', ['id' => $issue->id]);
    }

    public function test_issue_user_relationship()
    {
        $user = User::factory()->create();
        $issue = Issue::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $issue->user);
        $this->assertEquals($user->id, $issue->user->id);
    }



}
