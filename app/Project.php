<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function user() {

    return $this->belongsTo(User::class);
 }

    public function issue() {

    return $this->belongsToMany(Issue::class);
 }
}
