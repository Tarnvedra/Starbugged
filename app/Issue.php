<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Issue extends Model
{
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
