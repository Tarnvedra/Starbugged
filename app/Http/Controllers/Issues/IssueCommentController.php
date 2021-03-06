<?php

namespace App\Http\Controllers\Issues;


use App\Http\Controllers\Issues\Requests\UpdateIssueRequest;
use App\User;
use App\Project;
use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;


class IssueCommentController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function delete()
    {

    }

    public function edit()
    {

    }
    public function update()
    {

    }
    public function store()
    {

    }



}
