@extends('layouts/app')
@include('include/topnav')
@section('content')

@include('include/sidebar')
<div class="container">
<div class="row pt-5">

<div class="row pl-3">
    <table class="table table-bordered table-hover">
        <tr style="background-color: whitesmoke;">
            <th>#</th>
            <th>Project</th>
            <th>Description</th>
            @if ($user->useraccountlevel >= 60)
            <th>Edit Project</th>
            @endif
            @if ($user->useraccountlevel >= 20)
            <th>Create Issue</th>
            <th>Project Issues</th>
            @endif
        <tr>
@foreach($projects as $project)
        <tr>
            <td><a href="/project/{{ $project->id }}">{{ $project->id }}</a></td>
            <td>{{ $project->project }}</td>
            <td>{{ $project->description }}</td>
            @if ($user->useraccountlevel >= 60)
            <td>
                  <a href="/project/{{ $project->id }}/edit" class="btn btn-info">  {{ __('Edit Project') }}</a>
            </td>
            @endif
            @if ($user->useraccountlevel >= 20)
             <td>
                  <a href="/issue/create/{{  $project->id }}" class="btn btn-primary">  {{ __('Create Issue') }}</a>
            </td>
            <td>
                <a href="/tickets/{{  $project->id  }}" class="btn btn-danger">  {{ __('View Issues') }}</a>
          </td>

            @endif
        </tr>

@endforeach
    </table>
    {{ $projects->links() }}
</div>
<div class="pl-3">
    <a href="/home" class="btn btn-info">  {{ __('Back') }}</a>
    </div>
</div>

@endsection
