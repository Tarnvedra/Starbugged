@extends('layouts/app')
@include('include/topnav')
@section('content')

@include('include/sidebar')

<div class="container pt-4">

    <table class="table table-bordered">

        <tr>
        <th>User</th>
        <th>E-Mail</th>
        <th>Access level</th>
        <th>Manage Users</th>
        </tr>
        @foreach($users as $user)
        <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->useraccountlevel }} </td>
            <td>
                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary">  {{ __('Edit') }}</a>
                <a href="#/admin/users/{{  $user->id }}" class="btn btn-danger">  {{ __('Delete') }}</a>
          </td>
        </tr>
        @endforeach

    </table>
    {{ $users->links() }}
    <div class="col-sm-4">
        <a href="/admin" class="btn btn-info">  {{ __('Back') }}</a>
        </div>
    </div>
</div>


@endsection
