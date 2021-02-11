<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Role extends Model
{
 public function users()
  {

    return $this->belongsToMany(User::class);
  }

 public function permissions()
    {
        return $this->belongsToMany(Permission::class , 'role_permissions');
    }
}
