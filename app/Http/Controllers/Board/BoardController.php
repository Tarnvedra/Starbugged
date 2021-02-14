<?php

namespace App\Http\Controllers\Board;


use App\Http\Controllers\Controller;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use App\User;;
use App\Project;
use App\Issue;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BoardController extends Controller
{
    public function index(ViewFactory $view, Project $project): View
    {
        $user = auth()->user();
        $backlogs = Issue::where('project_id', '=', $project->id)->where('status','=', 'issue created')->get();
        $works = Issue::where('project_id', '=', $project->id)->where('status','=', 'in progress')->get();
        $feedbacks =  Issue::where('project_id', '=', $project->id)->where('status','=', 'issue updated')->get();
        $completions = Issue::where('project_id', '=', $project->id)->where('status','=', 'resolved')->get();

        return $view->make('/projects/task-board', [
            'project'     => $project,
            'backlogs'    => $backlogs,
            'works'       => $works,
            'feedbacks'   => $feedbacks,
            'completions' => $completions,
            'user'        => $user
        ]);
    }
}
