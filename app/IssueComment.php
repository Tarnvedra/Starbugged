<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssueComment extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public  function Issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }
}
