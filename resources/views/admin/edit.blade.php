@extends('layouts/app')

@section('content')


@include('include/sidebar')
<div class="container">
<h2 class="text-center pb-3">Edit User : {{ $user->username }}</h2>
<form action="/admin/users/{{$user->id}}" method="post">
@csrf
@method('PATCH')

<div class="form-group row">
    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

    <div class="col-md-6">
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="" autofocus>

        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Assign Roles') }}</label>
 <div class="col-md-6">

    @foreach ($roles as $role)

    <input type="checkbox" name="roles[]" id="roles"  value="{{ $role->id }}">
    <label class="pr-2">{{ $role->role_name }}</label>

    @endforeach

        @error('roles')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>




<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Update User') }}
        </button>
    </div>
</div>
</form>
</div>
@endsection
