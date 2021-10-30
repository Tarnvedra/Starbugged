<?php

namespace App\Http\Controllers\Issues;


use App\Http\Controllers\Issues\Requests\IssueCommentRequest;
use App\Http\Controllers\Issues\Requests\UpdateIssueRequest;
use App\IssueComment;
use App\User;
use App\Project;
use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class IssueCommentController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function destroy()
    {

    }

    public function edit()
    {

    }

    public function store(IssueCommentRequest $request, ResponseFactory $responseFactory)
    {
        $issue = Issue::find($request->input('issue'));
        $comment = new IssueComment();
        $comment->only($request->input('body'));
        $comment->user()->associate($request->user());
        $comment->task_id = $issue->id;
        //dd($issue, $comment);
        $comment->save();

        // dd($comment, $issue);

        return $responseFactory->json(['success' => 'Comment saved successfully',
        ]);

    }



}
