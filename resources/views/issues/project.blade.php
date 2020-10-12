@extends('layouts/app')
@include('include/topbar')
@include('include/sidebar')
@section('content')

<h2 class="p-3 text-center">Issues for:<b><i> {{ $project->project }}</i></b> project</h2>
<div class="row pl-3 pt-3">
    @if(count($issues) > 0 )
    <table class="table table-bordered table-striped">
        <tr>
            <th>Issue ID</th>
            <th>OS</th>
            <th>Risk</th>
            <th>Issue </th>
            <th>Assignment</th>
            <th>Status</th>
            <th>Issue Created</th>
            <th>Last Updated</th>
        </tr>

        @foreach($issues as $issue)
        <tr>
            <td> {{  $issue->id  }}</td>
            <td> {{ $issue->os }}</td>
            <td> {{ $issue->risk }}</td>
            <td> {{ $issue->issue }}</td>
            <td> {{ $issue->assignment }}</td>
            <td> {{ $issue->status }}</td>
            <td> {{ $issue->created_at}}</td>
            <td> {{ $issue->updated_at }}</td>

        </tr>
        @endforeach
        @else
        <p> No issues found for this project..keep on coding!.. </p>
        @endif
                </table>
                {{ $issues->links() }}

                <div class="pl-3">
                <a href="/projects" class="btn btn-info">  {{ __('Back') }}</a>
                </div>
</div>


@endsection
