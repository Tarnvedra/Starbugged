@extends('layouts/app')
@include('include/topnav')
@section('content')

@include('include/sidebar')
<div class="container">
<h2 class="text-center pb-3">Create Project</h2>
<form action="/project" enctype="multipart/form-data" method="post">
@csrf
<div class="form-group row">
    <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

    <div class="col-md-6">
        <input id="project" type="text" class="form-control @error('project') is-invalid @enderror" name="project" value="{{ old('project') }}" required autocomplete="Project Name" autofocus>

        @error('projectname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

    <div class="col-md-6">
        <textarea  type="text" rows="8" cols="50" class="form-control @error('dexcription') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="Project Description" autofocus></textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-4 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Create Project') }}
        </button>
        <a href="/admin" class="btn btn-info">  {{ __('Back') }}</a>
    </div>

    </div>
</div>
</form>
</div>
@endsection
