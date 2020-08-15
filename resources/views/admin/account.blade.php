@extends('layouts/app')
@include('include/topnav')
@section('content')

@include('include/sidebar')

<h1 class="text-center">Administration</h1>

<div class="row d-flex">
    <div id="projects"><a href="/project/create"><h2> Create Projects</h2></a>
        <p class="pt-3">placeholder graphic</p>
    </div>
    <div id="issues"><a href="#"><h2>Assign Issues</h2></a>
        <p class="pt-3">placeholder graphic</p>
    </div>
</div>
<div class="row d-flex">
    <div id="priority">
        @if ($user->useraccountlevel >= 90)
        <a href="/admin/users"><h2>User Management</h2></a>
        @else

        @endif
        <p class="pt-3">placeholder graphic</p>
    </div>
    <div id="status"><a href="#"><h2>Assign Users</h2></a>
        <p class="pt-3">placeholder graphic</p>
    </div>
</div>




@endsection
