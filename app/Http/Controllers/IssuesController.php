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

        $user = auth()->user();
        $issues = Issue::orderBy('id','asc')->paginate(9);
        return view('issues')->with('issues' , $issues)->with('user', $user);
    }



    public function priority()
    {
        $user = auth()->user();
         $issues = Issue::where('risk', '=','High')->orderBy('id','asc')->paginate(9);
        return view('issues/priority')->with('issues' ,$issues)->with('user',$user);
    }

    public function status()
    {

        $user = auth()->user();
        $issues = Issue::where('status', '=','issue created')->orderBy('created_at','asc')->paginate(9);
        return view('issues/status')->with('issues' ,$issues)->with('user',$user);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        $user = auth()->user();
        $project = Project::find($project_id);
        //dd($project);
        return view('issues/create')->with('project' , $project)->with('user' ,$user);
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

        return redirect('/issues');
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
        $user = auth()->user();
        return view('issues/show')->with('issue' , $issue)->with('user' , $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        return view('issues/edit')->with('issue' , $issue)->with('project' , $project)->with('user' , $user)->with('users_assigned', $users_assigned);
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
        $this->validate($request,[
            'os' => 'required',
            'risk' => 'required',
            'issue' => 'required',
            'description' => 'required',
        ]);

        $issue = Issue::find($id);
        $issue->os = $request->input('os');
        $issue->risk = $request->input('risk');
        $issue->issue = $request->input('issue');
        $issue->description = $request->input('description');
        $issue->assignment = $request->input('assignment');
        $issue->status = $request->input('status');
        $issue->save();

        return redirect('/issues');
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
