@extends('layouts/app')

@section('content')

@include('include/sidebar')
<h2 class="text-center pt-2">Dashboard</h2>
<div class="row">
<div id="projects"><h2><a href="/projects">Projects</a></h2>
<p class="pt-3">placeholder graphic</p></div>
<div id="issues"><h2><a href="/issues">Issues</a></h2><p class="pt-3">placeholder graphic</p></div>
</div>
<div class="row">
<div id="priority"><h2><a href="#">Issues by Priority</a></h2><p class="pt-3">placeholder graphic</p></div>
<div id="status"><h2><a href="#">Issues by Status</a></h2><p class="pt-3">placeholder graphic</p></div>
</div>
@endsection
