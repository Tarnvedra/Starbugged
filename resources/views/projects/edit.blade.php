@extends('layouts/app')

@section('content')

@include('include/sidebar')
<div class="container">
<h2 class="text-center pb-3">Edit Project</h2>
<form action="/project/{{ $project->id }}" enctype="multipart/form-data" method="post">
@csrf
@method('PATCH')

<div class="form-group row">
    <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

    <div class="col-md-6">
    <input id="project" type="text" class="form-control @error('project') is-invalid @enderror" name="project" value="{{ old('project') ?? $project->project }}" required autocomplete="" autofocus>

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
        <textarea id="description" rows="10" cols="50" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="" autofocus>{{ $project->description }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="assignment" class="col-md-4 col-form-label text-md-right">{{ __('Assignment') }}</label>

        <div class="col-md-6">

                <table class="table table-bordered">
                <tr>
                    <th>User</th>
                    <th class="pl-4">Assign</th>
                    <th> Acc Level </th>

                </tr>
                @foreach($user as $user)

                <tr>
                    @if ($user->useraccountlevel >= 50 && $user->useraccountlevel <=60)
                    <td><label class="pl-3" for="assignment">{{ $user->username }}</label></td>
              <td><input type="checkbox" id="assignment" name="assignment[]" class="form-control @error('assignment') is-invalid @enderror" value="{{ $user->username }}" autocomplete="" checked="checked" autofocus></td>
              <td>{{ $user->useraccountlevel }}</td>
              @else


                </tr>
                @endif
              @endforeach
                </table>

        @error('assignment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Update Project') }}
        </button>
        <a href="/projects" class="btn btn-info">  {{ __('Back') }}</a>
    </div>
</div>
</form>
</div>
@endsection
