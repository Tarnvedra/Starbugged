<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;

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
        $projects = Project::orderBy('id','asc')->paginate(6);
        return view('projects', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects/create');
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
        $project = Project::find($id);
        return view('projects/show')->with('project' , $project);
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
        $user = User::all();

        //dd($project->description);
        return view('projects/edit')->with('project' , $project)->with('user' , $user);
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
        //
    }
}
