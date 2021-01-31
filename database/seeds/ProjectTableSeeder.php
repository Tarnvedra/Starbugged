<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\User;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();
        $json = File::get("database/data/project.json");
        $projects = json_decode($json);
        foreach ($projects as $project)
        Project::create(array(
            'user_id' => 1,
            "project" => $project->project,
            "description" => $project->description,
            "users_assigned" => $project->users_assigned
        ));
    }
}
