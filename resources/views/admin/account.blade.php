@extends('layouts/app')
@include('include/topbar')
@include('include/sidebar')
@section('content')

<h2 class="text-center pt-4"><i>Administration</i></h2>

<div class="row">
    <div id="projects">
        <a href="/project/create" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-project-setup-100.png') }}"><span class="d-flex">Create Project</span></a>
    </div>
    <div id="issues">
        <a href="#" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-tasks-100.png') }}"><span class="d-flex">Assign Issues</span></a>
    </div>
</div>
<div class="row">
    <div id="priority">
        @if ($user->useraccountlevel >= 90)
        <a href="/admin/users" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-project-manager-100.png') }}"><span class="d-flex">User Management</span></a>
        @else

        @endif
    </div>
    <div id="status">
        <a href="#" class="text-decoration-none"><img src="{{ URL::asset('images/icons8-myspace-100.png') }}"><span class="d-flex">Assign Users</span></a>
    </div>
</div>

<a href="https://icons8.com/icon/D47p6uA2kE9C/project">all icons by Icons8 @ icons8.com</a>


@endsection
