<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    protected $guarded = [];

 public function user() {

    return $this->belongsTo(User::class);
 }

 public function issues() {

    return $this->hasMany(Project::class);
 }
}