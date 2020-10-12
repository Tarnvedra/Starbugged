@extends('layouts/app')
@include('include/topbar')
@include('include/sidebar')
@section('content')


    <div class="row pt-5">

        <div class="row pl-3">
            <table class="table table-bordered table-hover">
                <tr style="background-color: whitesmoke;">
                    <th>Project</th>
                    <th>Description</th>
                    <th>User(s) Assigned</th>
                    <th>Project Created at</th>
                    <th>Project Last Updated at</th>
                <tr>

                <tr>
                    <td>{{ $project->project }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->users_assigned}}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                </tr>


            </table>
            <a href="/projects" class="btn btn-info">  {{ __('All Projects') }}</a>
            <a href="/issues" class="btn btn-danger">  {{ __('All Issues') }}</a>
        </div>

@endsection
