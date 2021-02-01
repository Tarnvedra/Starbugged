<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Project;
use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Projects\Requests\CreateProjectRequest;
use App\Http\Controllers\Projects\Requests\UpdateProjectRequest;
use App\Http\Controllers\Projects\Requests\UpdateAssignedUsersRequest;

class ProjectsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(ViewFactory $view): View
    {
        $user = auth()->user();
        $projects = Project::orderBy('id', 'asc')->paginate(10);
        return $view->make('projects' , ['projects' => $projects, 'user' => $user]);
    }

    public function create(ViewFactory $view): View
    {
        $user = auth()->user();
        $projects = Project::orderBy('id', 'asc')->paginate(2);
        $issues = Issue::count();
        $projectsCount = Project::count();
        $status = Issue::where('status', '!=', 'resolved')->count();
        $amount = $issues - $status / 100;

        return $view->make('projects/create', [
            'user'           => $user,
            'projects'       => $projects,
            'issues'         => $issues,
            'projectCount'   => $projectsCount,
            'status'         => $status,
            'amount'         => $amount
        ]);
    }

    public function store(CreateProjectRequest $request, ResponseFactory $response): RedirectResponse
    {
        $data = $request->all();
        auth()->user()->projects()->create($data);
        return $response->redirectTo('/projects')->with('success', 'Project successfully created');
    }

    public function show(ViewFactory $view, $id): View
    {
        $user = auth()->user();
        $project = Project::find($id);
        return $view->make('projects/show' , ['project' => $project ,'user' => $user ]);
    }


    public function edit(ViewFactory $view, $id): View
    {
        $project = Project::find($id);
        $users = User::all();
        $user = auth()->user();

        //dd($project->description);
        return $view->make('projects/edit', [
            'project' => $project,
            'user'    => $user,
            'users'   => $users
        ]);
    }


    public function update(UpdateProjectRequest $request, ResponseFactory $response, $id): RedirectResponse
    {
        $project = Project::find($id);
        $project->project = $request->input('project');
        $project->description = $request->input('description');
        $project->users_assigned = $request->input('assignment');
        $project->save();
        return $response->redirectTo('/projects')->with('success', 'Project successfully updated');
    }


    public function destroy(ResponseFactory $response, $id): RedirectResponse
    {
        $project = Project::find($id);
        // $project->delete();
        return $response->redirectTo('/projects')->with('success', 'Project Deleted');
    }

    public function assignment(ViewFactory $view, $id): View
    {
        $users = User::all();
        $user = auth()->user();
        $project = Project::find($id);
        //orderBy('id','asc')->paginate(10);
        return $view->make('projects/assignusers', [
            'project' => $project,
            'user'    => $user,
            'users'   => $users
        ]);
    }

    public function assign(ViewFactory $view): View
    {
        $users = User::all();
        $user = auth()->user();
        $projects = Project::orderBy('id', 'asc')->paginate(10);
        return $view->make('projects/assign', [
            'projects' => $projects,
            'user'     => $user,
            'users'    => $users
        ]);
    }

    public function usersAssignment(UpdateAssignedUsersRequest $request, ResponseFactory $response, $id): RedirectResponse
    {
        $project = Project::find($id);
        $project->users_assigned = $request->input('assignment');
        $project->save();
        return $response->redirectTo('/projects')->with('success', 'Project successfully updated');
    }
}
