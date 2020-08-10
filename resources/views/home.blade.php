@extends('layouts/app')

@section('content')

@include('include/sidebar')
<div class="row">
<div id="projects"><h2><a href="/projects">Projects</a></h2></div>
<div id="issues"><h2><a href="/issues">Issues</a></h2></div>
</div>
<div class="row">
<div id="priority"><h2><a href="#">Issues by Priority</a></h2></div>
<div id="status"><h2><a href="#">Issues by Status</a></h2></div>
</div>
@endsection
