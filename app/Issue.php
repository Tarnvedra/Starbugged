<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Issue
 *
 * @property string $assignment
 * @property string $column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string $description
 * @property int $id
 * @property string $issue
 * @property string|null $modified_at
 * @property string|null $moved_at
 * @property string $os
 * @property int $position
 * @property int $priority
 * @property int $project_id
 * @property string $risk
 * @property string|null $started_at
 * @property string $status
 * @property string $swim_lane
 * @property int $task_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\IssueComment[] $comments
 * @property-read int|null $comments_count
 * @property-read Issue $project
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $watchers
 * @property-read int|null $watchers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Issue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Issue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Issue query()
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereAssignment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereIssue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereModifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereMovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereRisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereSwimLane($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Issue whereUserId($value)
 * @mixin \Eloquent
 */
class Issue extends Model
{
    use HasFactory;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }

     public function watchers(): BelongsToMany
     {
        return $this->belongsToMany(User::class);
     }

     public  function user(): BelongsTo
     {
         return $this->belongsTo(User::class);
     }

     public function comments(): HasMany
     {
         return $this->hasMany(IssueComment::class);
     }


}
