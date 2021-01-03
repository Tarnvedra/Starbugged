<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->delete();
      $json = File::get("database/data/role.json");
      $roles = json_decode($json);
      foreach ($roles as $role)
      Role::create(array(
          'name' => $role->name,
          'guard_name' => $role->guard_name,
    ));
    }
}
