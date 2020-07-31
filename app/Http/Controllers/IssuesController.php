<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Issue;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::orderBy('id','asc')->paginate(10);
        return view('issues', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        $project = Project::find($project_id);
        //dd($project);
        return view('issues/create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'os' => 'required',
            'risk' => 'required',
            'issue' => 'required',
            'description' => 'required',
        ]);

        $issue = new Issue;
        $issue->project_id = $id;
        $issue->os = $request->input('os');
        $issue->risk = $request->input('risk');
        $issue->issue = $request->input('issue');
        $issue->description = $request->input('description');
        $issue->assignment = 'none';
        $issue->status = 'issue created';
        $issue->save();

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = Issue::find($id);
        return view('issues/show')->with('issue' , $issue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
