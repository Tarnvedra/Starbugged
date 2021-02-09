<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function project() {

        return $this->belongsTo(Issue::class);
     }

     public function watchers() {

        return $this->belongsToMany(User::class);
     }

     public  function user() {

        return $this->belongsTo(User::class);
     }


}
