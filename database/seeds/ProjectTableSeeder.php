<?php

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('projects')->delete();
        $json = File::get("database/data/starbugged_projects.json");

        $projects = json_decode($json);
        foreach ($projects as $project)
        Project::query()->create(array(
            'user_id' => 1,
            "project_name" => $project->project_name,
            "description" => $project->description,
            "users_assign" => json_encode($project->users_assign)
        ));
    }
}
