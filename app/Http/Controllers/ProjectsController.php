<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Issue;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {

        $this->middleware('auth');
    }


    public function index()
    {
        $user = auth()->user();
        $projects = Project::orderBy('id','asc')->paginate(10);
        return view('projects')->with('projects' , $projects)->with('user' , $user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'project' => 'required',
            'description' => 'required',
        ]);

        auth()->user()->projects()->create($data);
        return redirect('/projects')->with('success' , 'Project succesfully created');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $project = Project::find($id);
        return view('projects/show')->with('project' , $project)->with('user' , $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $users = User::all();
        $user = auth()->user();

        //dd($project->description);
        return view('projects/edit')->with('project' , $project)->with('user' , $user)->with('users' , $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $project = Project::find($id);
    $project->delete();
    return redirect('/projects')->with('success' , 'Project Deleted');
    }


}
