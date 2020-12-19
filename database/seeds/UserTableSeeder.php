<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();
      $json = File::get("database/data/user.json");
      $users = json_decode($json);
      foreach ($users as $user)
      User::create(array(
          'name' => $user->name,
          'username' => $user->username,
          "job_title" => $user->job_title,
          "profile_image" => $user->profile_image,
          "about_me" => $user->about_me,
          'email' => $user->email,
          'password' => Hash::make($user->password),
          'useraccountlevel' => $user->useraccountlevel
      ));
    }
}
