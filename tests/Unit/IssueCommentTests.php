<?php

namespace Tests\Unit;

use App\Models\Issue;
use App\Models\IssueComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class IssueCommentTests extends TestCase
{
    public function test_issue_comment_fillable_attributes()
    {
        $comment = new IssueComment();
        $this->assertEquals(['body'], $comment->getFillable());
    }

    public function test_issue_comment_belongs_to_user()
    {
        $comment = new IssueComment();
        $this->assertInstanceOf(BelongsTo::class, $comment->user());
    }

    public function test_issue_comment_can_be_created_with_factory()
    {
        $comment = IssueComment::factory()->create();
        $this->assertDatabaseHas('issue_comments', ['id' => $comment->id]);
    }

    public function test_issue_comment_user_relationship()
    {
        $user = User::factory()->create();
        $comment = IssueComment::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $comment->user);
        $this->assertEquals($user->id, $comment->user->id);
    }

    public function test_issue_comment_issue_relationship()
    {
        $issue = Issue::factory()->create();
        $comment = IssueComment::factory()->create(['issue_id' => $issue->id]);

        $this->assertInstanceOf(Issue::class, $comment->issue);
        $this->assertEquals($issue->id, $comment->issue->id);
    }

    public function test_issue_comment_body_is_stored()
    {
        $comment = IssueComment::factory()->create(['body' => 'This is a test comment.']);
        $this->assertEquals('This is a test comment.', $comment->body);
    }

    public function test_issue_comment_has_timestamps()
    {
        $comment = IssueComment::factory()->create();
        $this->assertNotNull($comment->created_at);
        $this->assertNotNull($comment->updated_at);
    }

}
