<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Project;
use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Projects\Requests\CreateProjectRequest;
use App\Http\Controllers\Projects\Requests\UpdateProjectRequest;
use App\Http\Controllers\Projects\Requests\UpdateAssignedUsersRequest;

class ProjectsController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $projects = Project::orderBy('id','asc')->paginate(10);
        return view('projects')->with('projects' , $projects)->with('user' , $user);

    }

    public function create()
    {
        $user = auth()->user();
        $projects = Project::orderBy('id','asc')->paginate(2);
        $issues = Issue::count();
        $projs = Project::count();
        $status = Issue::where('status', '!=', 'resolved')->count();
        $amount = $issues - $status /100;
        return view('projects/create')->with('user' , $user)->with('projects' , $projects)->with('issues' , $issues)->with(
            'projs' ,$projs)->with('status', $status)->with('amount' , $amount);
    }

    public function store(CreateProjectRequest $request)
    {
        $data = request()->all();
        auth()->user()->projects()->create($data);
        return redirect('/projects')->with('success' , 'Project successfully created');
}

     public function show($id)
    {
        $user = auth()->user();
        $project = Project::find($id);
        return view('projects/show')->with('project' , $project)->with('user' , $user);
    }


    public function edit($id)
    {
        $project = Project::find($id);
        $users = User::all();
        $user = auth()->user();

        //dd($project->description);
        return view('projects/edit')->with('project' , $project)->with('user' , $user)->with('users' , $users);
    }


    public function update(UpdateProjectRequest $request, $id)
    {
    $data = request()->validate([
        'project' => 'required',
        'description' => 'required',

    ]);
    $project = Project::find($id);
    $project->project = $request->input('project');
    $project->description = $request->input('description');
    $project->users_assigned = $request->input('assignment');
    $project->save();
    return redirect('/projects')->with('success' , 'Project succesfully updated');
    }


    public function destroy($id)
    {
    $project = Project::find($id);
    // $project->delete();
    return redirect('/projects')->with('success' , 'Project Deleted');
    }

    public function assignment($id)
    {

        $users = User::all();
        $user = auth()->user();
        $project = Project::find($id);
        //orderBy('id','asc')->paginate(10);
        return view('projects/assignusers')->with('project' , $project)->with('user' , $user)->with('users' , $users);

    }

    public function assign()
    {

        $users = User::all();
        $user = auth()->user();
        $projects = Project::orderBy('id','asc')->paginate(10);
        return view('projects/assign')->with('projects' , $projects)->with('user' , $user)->with('users' , $users);

    }

    public function usersAssignment(UpdateAssignedUsersRequest $request, $id)
    {

    $project = Project::find($id);
    $project->users_assigned = $request->input('assignment');
    $project->save();
    return redirect('/projects')->with('success' , 'Project succesfully updated');
    }
}
