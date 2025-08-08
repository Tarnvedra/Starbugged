<?php

namespace App\Http\Controllers\Watching;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WatchingController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index(ViewFactory $view): View
    {
        $user = auth()->user();
        $issues = Issue::where('risk','=', 'Low')->orderBy('created_at','asc')->paginate(10);
        return $view->make('issues/watching' , [
            'user'   => $user,
            'issues' => $issues
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Issue $issue)
    {
        return auth()->user()->watching()->toggle($issue->watchers);
    }

    public function show($id)
    {
        //
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
