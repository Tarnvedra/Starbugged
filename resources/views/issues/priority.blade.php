@extends('layouts/app')

@section('content')


@include('include/sidebar')

<priority-component></priority-component>
<div class="row pl-3 pt-3">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Issue ID</th>
            <th>Project ID</th>
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
            <td><a href="issue/{{ $issue->id}}">{{  $issue->id  }}</a></td>
            <td><a href="project/{{$issue->project_id}}">{{ $issue->project_id  }}</a></td>
            <td> {{ $issue->os }}</td>
            <td> {{ $issue->risk }}</td>
            <td> {{ $issue->issue }}</td>
            <td> {{ $issue->assignment }}</td>
            <td> {{ $issue->status }}</td>
            <td> {{ $issue->created_at}}</td>
            <td> {{ $issue->updated_at }}</td>

        </tr>
        @endforeach
                </table>
                {{ $issues->links() }}

                <div class="pl-3">
                    <a href="/home" class="btn btn-info">  {{ __('Back') }}</a>
                    </div>
                </div>

</div>

@endsection
