<?php

namespace App\Http\Controllers\Priorities;

use App\Http\Controllers\Controller;
use App\Issue;
use App\Http\Resources\Issue as IssueResource;
use Illuminate\Http\Request;

class PrioritiesController extends Controller
{
    public function index()
    {
        $issues = Issue::orderBy('id','asc')->paginate(10);
        return IssueResource::collection($issues);
        //return response()->json($issues);
    }

    public function getLowPriority()
    {
        $issues = Issue::where('risk','=', 'Low')->orderBy('id','asc')->paginate(10);
        return IssueResource::collection($issues);
    }

    public function getMediumPriority()
    {
        $issues = Issue::where('risk','=', 'Medium')->orderBy('id','asc')->paginate(10);
        return IssueResource::collection($issues);
    }

    public function getHighPriority()
    {
        $issues = Issue::where('risk','=', 'High')->orderBy('id','asc')->paginate(10);
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
