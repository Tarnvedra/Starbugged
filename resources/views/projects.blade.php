@extends('layouts/app')

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
            <th>Edit Projects</th>
            <th>Create Issues</th>
        <tr>
@foreach($projects as $project)
        <tr>
            <td><a href="/project/{{ $project->id }}">{{ $project->id }}</a></td>
            <td>{{ $project->project }}</td>
            <td>{{ $project->description }}</td>
            <td>
                  <a href="/project/{{ $project->id }}/edit" class="btn btn-info">  {{ __('Edit Project') }}</a>
            </td>
             <td>
                  <a href="/issue/create/{{  $project->id }}" class="btn btn-primary">  {{ __('Create Issue') }}</a>
            </td>
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
