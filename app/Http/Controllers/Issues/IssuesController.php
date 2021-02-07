<?php

namespace App\Http\Controllers\Issues;

use App\Http\Controllers\Issues\Requests\CreateIssueRequest;
use App\Http\Controllers\Issues\Requests\UpdateIssueRequest;
use App\User;
use App\Project;
use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

class IssuesController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index(ViewFactory $view): View
    {
        $user = auth()->user();
        $issues = Issue::orderBy('id','asc')->paginate(10);
        return $view->make('issues', [
            'issues' => $issues,
            'user'   => $user
            ]);
    }

    public function priority(ViewFactory $view): View
    {
        $user = auth()->user();
         $issues = Issue::where('risk', '=','High')->orderBy('id','asc')->paginate(9);
        return $view->make('issues/priority', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }

    public function status(ViewFactory $view): View
    {
        $user = auth()->user();
        $issues = Issue::where('status', '=','issue created')->orderBy('created_at','asc')->paginate(9);
        return $view->make('issues/status', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }

    public function issues($id, ViewFactory $view): View
    {
        $user = auth()->user();
        $project = Project::find($id);
        $issues = Issue::where('project_id','=', $id)->orderBy('created_at','asc')->paginate(9);
        return $view->make('issues/project', [
            'project' => $project,
            'issues'  => $issues,
            'user'    => $user
        ]);
    }

    public function create($project_id, ViewFactory $view): View
    {
        $user = auth()->user();
        $project = Project::find($project_id);
        //dd($project);
        return $view->make('issues/create', [
            'project' => $project,
            'user'    => $user
        ]);
    }


    public function store(CreateIssueRequest $request, ResponseFactory $response, $id): RedirectResponse
    {
        $issue = new Issue;
        $issue->project_id = $id;
        $issue->user_id = auth()->user()->id;
        $issue->os = $request->input('os');
        $issue->risk = $request->input('risk');
        $issue->issue = $request->input('issue');
        $issue->title = $request->input('title');
        $issue->description = $request->input('description');
        $issue->assignment = 'none';
        $issue->status = 'issue created';
        $issue->save();

        return $response->redirectTo('/issues')->with('success', 'Ticket successfully created');
    }

    public function show($id, ViewFactory $view): View
    {
        $issue = Issue::find($id);
        $user = auth()->user();
        return $view->make('issues/show', [
            'issue' => $issue,
            'user'  => $user
        ]);
    }

    public function edit($id, ViewFactory $view): View
    {
        $issue = Issue::find($id);
        $project_id = $issue->project_id;
        $project = Project::find($project_id);
        //dd($project->users_assigned);

        $user = auth()->user();
        $users_assigned = User::where('useraccountlevel','=','50')->get();
        //dd($users_assigned);
        //$users_assigned =  Project::find($project_id)->where('users_assigned' ,'=',  $project->users_assigned)->get();

        //User::all('username')->where('users_assigned' ,'=',  $project->users_assigned)->get();
        //dd($users);
        return $view->make('issues/edit', [
            'issue'          => $issue,
            'project'        => $project,
            'user'           => $user,
            'users_assigned' => $users_assigned
        ]);
    }

    public function update(UpdateIssueRequest $request, ResponseFactory $response, $id): RedirectResponse
    {
        $issue = Issue::find($id);
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
        //$user = auth()->user();
        //dd($user->name);
        //$issue = Issue::where('assignment','=', $user->name);
        //$issues = Issue::all();
        //dd($issue , $issues);

        $user = auth()->user();
        $issues = Issue::where('assignment','=', $user->name ,'and')->where('status','!=','resolved')->orderBy('id','asc')->paginate(10);
        return $view->make('issues/currentuser', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }

    public function reported(ViewFactory $view): View
    {
        //$user = auth()->user();
        //dd($user->name);
        //$issue = Issue::where('assignment','=', $user->name);
        //$issues = Issue::all();
        //dd($issue , $issues);

        $user = auth()->user();
        $issues = Issue::where('user_id','=', $user->id ,'and')->where('status','!=','resolved')->orderBy('id','asc')->paginate(10);
        return $view->make('issues/userreported', [
            'issues' => $issues,
            'user'   => $user
        ]);
    }
}
