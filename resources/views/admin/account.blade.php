@extends('layouts/app')

@section('content')

@include('include/sidebar')

<h1 class="text-center">Administration</h1>

<div class="row d-flex">
    <div id="projects"><a href="/project/create"><h2> Create Projects</h2></a></div>
    <div id="issues"><h2>Assign Issues</h2></div>
    </div>
    <div class="row d-flex">
    <div id="priority"><a href="/admin/users"><h2>User Management</h2></a></div>
    <div id="status"><h2>Assign Users</h2></div>
    </div>




@endsection
