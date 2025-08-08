<?php

namespace App\Http\Controllers\Issues;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Issues\Requests\CreateIssueRequest;
use App\Http\Controllers\Issues\Requests\UpdateIssueRequest;
use App\Models\Issue;
use App\Models\IssueComment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\ResponseFactory;

class IssuesController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index(ViewFactory $view): View
    {
        $user = auth()->user();
        $issues = Issue::query()->orderBy('id','asc')->paginate(10);

        return $view->make('issues', [
            'issues' => $issues,
            'user'   => $user
            ]);
    }

    public function priority(ViewFactory $view): View
    {
        $user = auth()->user();
         $issues = Issue::query()->where('risk', '=','High')
             ->orderBy('id','asc')
             ->paginate(9);

         return $view->make('issues/priority', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }

    public function status(ViewFactory $view): View
    {
        $user = auth()->user();
        $issues = Issue::query()->where('status', '=','issue created')
            ->orderBy('created_at','asc')
            ->paginate(9);

        return $view->make('issues/status', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }

    public function issues($id, ViewFactory $view): View
    {
        $user = auth()->user();
        $project = Project::query()->find($id);
        $issues = Issue::query()->where('project_id','=', $id)
            ->orderBy('created_at','asc')
            ->paginate(9);

        return $view->make('issues/project', [
            'project' => $project,
            'issues'  => $issues,
            'user'    => $user
        ]);
    }

    public function create($project_id, ViewFactory $view): View
    {
        $user = auth()->user();
        $project = Project::query()->find($project_id);

        return $view->make('issues/create', [
            'project' => $project,
            'user'    => $user
        ]);
    }


    public function store(CreateIssueRequest $request, ResponseFactory $response, $id): RedirectResponse
    {
        $task_id = Issue::query()->where('project_id', '=', $id)->value('task_id');
        $task_id++;
        $issue = new Issue;
        $issue->project()->associate($id);
        $issue->user_id = auth()->id();
        $issue->os = $request->input('os');
        $issue->risk = $request->input('risk');
        $issue->issue = $request->input('issue');
        $issue->title = $request->input('title');
        $issue->description = $request->input('description');
        $issue->assignment = 'none';
        $issue->status = 'issue created';
        $issue->task_id = $task_id;
        $issue->priority = 1;
        $issue->position = 1;
        $issue->column = 'backlog';
        $issue->swim_lane = 1;
        $issue->save();

        return $response->redirectTo('/issues')->with('success', 'Ticket successfully created');
    }

    public function show($id, ViewFactory $view): View
    {
        $issue = Issue::query()->find($id);
        $user = auth()->user();

        $comments = IssueComment::query()->where('issue_id', '=', $issue->id)->get();

        return $view->make('issues/show', [
            'issue'    => $issue,
            'user'     => $user,
            'comments' => $comments
        ]);
    }

    public function edit($id, ViewFactory $view): View
    {
        $issue = Issue::query()->find($id);
        $project_id = $issue->project_id;
        $project = Project::query()->find($project_id);

        $user = auth()->user();
        $users_assigned = User::all();

        return $view->make('issues/edit', [
            'issue'          => $issue,
            'project'        => $project,
            'user'           => $user,
            'users_assigned' => $users_assigned
        ]);
    }

    public function update(UpdateIssueRequest $request, ResponseFactory $response, $id): RedirectResponse
    {
        $issue = Issue::query()->find($id);
        $issue->os = $request->input('os');
        $issue->risk = $request->input('risk');
        $issue->issue = $request->input('issue');
        $issue->title = $request->input('title');
        $issue->description = $request->input('description');
        $issue->assignment = $request->input('assignment');
        $issue->status = $request->input('status');
        $issue->save();

        return $response->redirectTo('/issues')->with('success', 'Ticket successfully updated');
    }

    public function destroy($id)
    {
        //
    }

    public function assigned(ViewFactory $view): View
    {
        $user = auth()->user();
        $issues = Issue::query()->where('assignment','=', $user->name ,'and')
            ->where('status','!=','resolved')
            ->orderBy('id','asc')
            ->paginate(10);

        return $view->make('issues/current_user', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }

    public function reported(ViewFactory $view): View
    {
        $user = auth()->user();
        $issues = Issue::query()->where('user_id','=', $user->id ,'and')
            ->where('status','!=','resolved')
            ->orderBy('id','asc')
            ->paginate(10);

        return $view->make('issues/user_reported', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }
}
