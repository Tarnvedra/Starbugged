@extends('layouts/app')
@include('include/topnav')

@section('content')

@include('include/sidebar')
<h2 class="text-center pt-4"><i>Dashboard</i></h2>
<div class="row">
    <div id="projects">
        <a href="/projects" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-project-100.png') }}"><span class="d-flex">View Projects</span></a>


    </div>
    <div id="issues">
        <a href="/issues" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-task-100.png') }}"><span class="d-flex">View Issues</span></a>
    </div>
</div>
<div class="row">
    <div id="priority">
        <a href="/priority" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-brochure-100.png') }}"><span class="d-flex">Issues by Priority</span></a>

    </div>
    <div id="status">
        <a href="/status" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-task-planning-100.png') }}"><span class="d-flex">Issues by Status</span></a>

    </div>
</div>
<a href="https://icons8.com/icon/D47p6uA2kE9C/project">all icons by Icons8 @ icons8.com</a>
@endsection
