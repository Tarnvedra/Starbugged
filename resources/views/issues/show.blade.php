@extends('layouts/app')
@include('include/topnav')
@section('content')

@include('include/sidebar')

    <div class="row pt-5">

        <div class="row pl-3">
            <table class="table table-bordered table-hover">
                <tr style="background-color: whitesmoke;">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Issue ID</th>
                            <th>Project ID</th>
                            <th>OS</th>
                            <th>Risk</th>
                            <th>Issue </th>
                            <th>Description</th>
                            <th>Assignment</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Last Updated</th>

                        </tr>

                <tr>

                <tr>
                    <td> {{  $issue->id  }}</td>
                    <td> {{ $issue->project_id }}</td>
                    <td> {{ $issue->os }}</td>
                    <td> {{ $issue->risk }}</td>
                    <td> {{ $issue->issue }}</td>
                    <td> {{ $issue->description }}</td>
                    <td> {{ $issue->assignment }}</td>
                    <td> {{ $issue->status }}</td>
                    <td> {{ $issue->created_at}}</td>
                    <td> {{ $issue->updated_at }}</td>

                </tr>


            </table>
            <a href="/issue/{{ $issue->id }}/edit" class="btn btn-success">  {{ __('Edit Issue') }}</a>
            <a href="/issues" class="btn btn-info">  {{ __('Back') }}</a>
        </div>

@endsection
