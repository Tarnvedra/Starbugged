<?php

namespace App\Http\Controllers\Board;


use App\Http\Controllers\Board\Requests\GetBoardRequest;
use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\Project;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

;

class BoardController extends Controller
{
    public function index(ViewFactory $view, Project $project): View
    {
        $user = auth()->user();
        $backlogs = Issue::query()->where('project_id', '=', $project->id)
                                  ->where('status','=', 'issue created')
                                  ->get();

        $works = Issue::query()->where('project_id', '=', $project->id)
                               ->where('status','=', 'in progress')
                               ->get();

        $feedbacks =  Issue::query()->where('project_id', '=', $project->id)
                                    ->where('status','=', 'issue updated')
                                    ->get();

        $completions = Issue::query()->where('project_id', '=', $project->id)
                                     ->where('status','=', 'resolved')->get();

        $taskboards = Project::query()->get();

        return $view->make('/projects/task-board', [
            'taskboards'  => $taskboards,
            'project'     => $project,
            'backlogs'    => $backlogs,
            'works'       => $works,
            'feedbacks'   => $feedbacks,
            'completions' => $completions,
            'user'        => $user
        ]);
    }

    public function board(ViewFactory $view, GetBoardRequest $request): View
    {
        $board =  $request->input('board');

        $selectedProject = Project::query()->where('id', '=', $board )->value('id');
        $user = auth()->user();
        $backlogs = Issue::query()->where('project_id', '=', $selectedProject)->where('status','=', 'issue created')->get();
        $works = Issue::query()->where('project_id', '=', $selectedProject)->where('status','=', 'in progress')->get();
        $feedbacks =  Issue::query()->where('project_id', '=', $selectedProject)->where('status','=', 'issue updated')->get();
        $completions = Issue::query()->where('project_id', '=', $selectedProject)->where('status','=', 'resolved')->get();
        $taskboards = Project::query()->get();

        $project = Project::query()->where('id', '=', $board )->get()->toArray();
      //  dd($project, $selectedProject, $board, $backlogs);
        return $view->make('/projects/task-board', [
            'taskboards'  => $taskboards,
            'project'     => $project,
            'backlogs'    => $backlogs,
            'works'       => $works,
            'feedbacks'   => $feedbacks,
            'completions' => $completions,
            'user'        => $user
        ]);
    }
}
