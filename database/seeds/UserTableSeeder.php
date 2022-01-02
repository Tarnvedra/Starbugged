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
          'password' => Hash::make($user->password)
      ));


        $users = User::query()->with(['roles.permissions'])->get();
        foreach ($users as $user) {
            if ($user->job_title === 'Administrator' || $user->name === 'test') {
                $user->syncRoles('admin');
            } elseif ($user->job_title === 'Manager') {
                $user->syncRoles('manager');
            }

            if ($user->job_title === 'Web Developer') {
                $user->syncRoles('coder');
            } elseif ($user->job_title === 'Android Developer') {
                $user->syncRoles('coder');
            } elseif ($user->job_title === 'IOS Developer') {
                $user->syncRoles('coder');
            } elseif ($user->job_title === '.NET Developer') {
                $user->syncRoles('coder');
            }

            if ($user->job_title === 'QA') {
                $user->syncRoles('tester');
            } elseif ($user->job_title === 'Reporter') {
                $user->syncRoles('reporter');
            }

            if ($user->job_title === 'Guest') {
                $user->syncRoles('guest');
            } elseif ($user->job_title === null || $user->job_title === 'unknown') {
                $user->syncRoles('deactivated');
            }
        }
    }
}
