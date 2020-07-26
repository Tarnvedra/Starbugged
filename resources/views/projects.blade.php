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
            <th>Project Maintenance</th>
        <tr>
@foreach($projects as $project)
        <tr>
            <td><a href="#">{{ $project->id }}</a></td>
            <td>{{ $project->project }}</td>
            <td>{{ $project->description }}</td>
            <td>
                <button type="submit" class="btn btn-danger">
                    {{ __('Edit Project') }}
                </button>
            </td>
        </tr>

@endforeach
    </table>

</div>
</div>

@endsection
