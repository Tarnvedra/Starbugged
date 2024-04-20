<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Project
 *
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string $description
 * @property int $id
 * @property string $project_name
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string|null $users_assign
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Issue[] $issue
 * @property-read int|null $issue_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUsersAssign($value)
 * @mixin \Eloquent
 */
class Project extends Model
{

    use HasFactory;
    protected $fillable = ['project_name', 'description', 'users_assign'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function issue(): BelongsToMany
    {
        return $this->belongsToMany(Issue::class);
    }
}
