@extends('layouts/app')

@section('content')

@include('include/sidebar')
<div class="row">
<div id="projects"><h2>Projects</h2></div>
<div id="issues"><h2>Issues</h2></div>
</div>
<div class="row">
<div id="priority"><h2>Issues by Priority</h2></div>
<div id="status"><h2>Issues by Status</h2></div>
</div>
@endsection
