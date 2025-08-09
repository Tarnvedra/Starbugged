<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\IssueComment
 *
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int $id
 * @property int $task_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \App\Models\Issue $Issue
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment whereUserId($value)
 * @property int $issue_id
 * @property-read \App\Models\Issue $issue
 * @method static \Illuminate\Database\Eloquent\Builder|IssueComment whereIssueId($value)
 * @mixin \Eloquent
 */
class IssueComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public  function issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }
}
