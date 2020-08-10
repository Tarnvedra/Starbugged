<?php

namespace App;

use \App\User;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
 public function users() {

    return $this->belongsToMany(User::class);
 }
}
