<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Http\Requests;
use App\Http\Resources\Issue as IssueResource;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $issues = Issue::paginate(10);
        return IssueResource::collection($issues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created(Request $request){

        $issues = Issue::where('status','=', 'issue created')->orderBy('created_at','asc')->paginate(10);
        return IssueResource::collection($issues);

    }

    public function progress(Request $request){

        $issues = Issue::where('status','=', 'in progress')->orderBy('created_at','asc')->paginate(10);
        return IssueResource::collection($issues);

    }

    public function resolved(Request $request){

        $issues = Issue::where('status','=', 'resolved')->orderBy('created_at','asc')->paginate(10);
        return IssueResource::collection($issues);

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    return new IssueResource($issue);
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
