<?php

namespace App\Http\Controllers\Status;

use App\Issue;
use App\Http\Resources\Issue as IssueResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $issues = Issue::orderBy('id','asc')->paginate(10);
        return IssueResource::collection($issues);
    }

    public function created(){

        $issues = Issue::where('status','=', 'issue created')->orderBy('id','asc')->paginate(10);
        return IssueResource::collection($issues);

    }

    public function progress(){

        $issues = Issue::where('status','=', 'in progress')->orderBy('id','asc')->paginate(10);
        return IssueResource::collection($issues);

    }

    public function resolved(){

        $issues = Issue::where('status','=', 'resolved')->orderBy('id','asc')->paginate(10);
        return IssueResource::collection($issues);

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
    $issue = Issue::find($id);
    return new IssueResource($issue);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
