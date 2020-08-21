@extends('layouts/app')
@include('include/topnav')
@section('content')


@include('include/sidebar')
<div class="container">
<h2 class="text-center pb-3">Update issue #{{ $issue->id }} for : <i>{{ $project->project }}</i></h2>
<form action="/issue/{{ $issue->id }}" enctype="multipart/form-data" method="post">
@csrf
@method('PATCH')

<div class="form-group row">
    <label for="os" class="col-md-4 col-form-label text-md-right">{{ __('OS') }}</label>

    <div class="col-md-6">
        <select id="os" name="os" class="form-control @error('os') is-invalid @enderror" required autocomplete="" autofocus >
            <option value="Windows">Windows</option>
            <option value="Linux">Linux</option>
            <option value="Mac">Mac</option>
            <option value="Android">Android</option>
            <option value="IOS">IOS</option>
            <option value="Other">Other</option>
          </select>

        @error('os')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="risk" class="col-md-4 col-form-label text-md-right">{{ __('Risk') }}</label>

        <div class="col-md-6">
            <select id="risk" name="risk" class="form-control @error('risk') is-invalid @enderror" required autocomplete="" autofocus >
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
              </select>

        @error('risk')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="issue" class="col-md-4 col-form-label text-md-right">{{ __('Issue Type') }}</label>

        <div class="col-md-6">
            <select id="issue" name="issue" class="form-control @error('issue') is-invalid @enderror" required autocomplete="" autofocus >
                <option value="Runtime Error">Runtime Error</option>
                <option value="Logic Error">Logic Error</option>
                <option value="General Issue">General Issue</option>
                <option value="Other">Other</option>
              </select>

        @error('issue')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

        <div class="col-md-6">
            <select id="issuestatus" name="status" class="form-control @error('status') is-invalid @enderror" required autocomplete="" autofocus >
                <option value="In progress">In progress</option>
                <option value="Issue updated">Issue updated</option>
                <option value="Resolved">Resolved</option>
                <option value="Other">Other</option>
              </select>

        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="assignment" class="col-md-4 col-form-label text-md-right">{{ __('Assignment') }}</label>

        <div class="col-md-6">
            <select id="assignment" name="assignment" class="form-control @error('assignment') is-invalid @enderror" autocomplete="" autofocus >
               <option>Issue Resolved</option>
                @foreach($users_assigned as $users_assign)
                <option>{{ $users_assign->username }}</option>
                @endforeach
              </select>

        @error('assignment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

    <div class="col-md-6">
        <textarea  type="text" rows="8" cols="50" class="form-control @error('dexcription') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="Project Description" autofocus>{{ $issue->description }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Update Issue') }}
        </button>
        <a href="/issues" class="btn btn-info">  {{ __('Back') }}</a>
    </div>

</div>
</form>
</div>
@endsection
