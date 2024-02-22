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


    public function destroy(IssueComment $comment, ViewFactory $view): View
    {
        $issue = Issue::query()->where('id', '=',$comment->issue_id)->first();

        $comment->delete();

        $comments = IssueComment::query()->where('issue_id', '=', $issue->id)->get();
        return $view->make('issues/show', [
            'issue'    => $issue,
            'user'     => Auth::user(),
            'comments' => $comments
        ]);
    }


    public function update(Request $request, IssueComment $comment, ViewFactory $view): View
    {
        $issue = Issue::query()->where('id', '=',$comment->issue_id)->first();

        $comment->body = $request->input('issue_body_comment');
        $comment->save();

        $comments = IssueComment::query()->where('issue_id', '=', $comment->issue_id)->get();
        return $view->make('issues/show', [
            'issue'    => $issue,
            'user'     => Auth::user(),
            'comments' => $comments
        ])->with('success', 'Comment successfully updated');
    }

    public function store(IssueCommentRequest $request, Issue $issue, ResponseFactory $response): RedirectResponse
    {
        $comment = new IssueComment();
        $comment->body = $request->input('issue_body_comment');
        $comment->user()->associate($request->user());
        $comment->issue_id = $issue->id;

        $comment->save();

        $comments = IssueComment::query()->where('issue_id', '=', $issue->id)->get();

        return $response->redirectToRoute('issue.show', [
            'id'       => $issue->id,
        ])->with('success', 'Comment successfully created');
    }

    public function edit(ViewFactory $view, IssueComment $comment): View
    {
        return $view->make('issues/comments/edit_comment', [
            'user'     => Auth::user(),
            'comment'  => $comment
        ]);
    }



}
