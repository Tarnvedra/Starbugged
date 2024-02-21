<?php

namespace App\Http\Controllers\Issues;


use App\Http\Controllers\Issues\Requests\IssueCommentRequest;
use App\Http\Controllers\Issues\Requests\UpdateIssueRequest;
use App\IssueComment;
use App\User;
use App\Project;
use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function store(IssueCommentRequest $request, Issue $issue, ViewFactory $view): View
    {
        $comment = new IssueComment();
        $comment->body = $request->input('issue_body_comment');
        $comment->user()->associate($request->user());
        $comment->issue_id = $issue->id;

        $comment->save();

        $comments = IssueComment::query()->where('issue_id', '=', $issue->id)->get();
        return $view->make('issues/show', [
            'issue'    => $issue,
            'user'     => Auth::user(),
            'comments' => $comments
        ]);
    }



}
