@extends('layouts/app')
@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('include/sidebar')
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            @include('include/topbar')
            <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
                    <p class="mb-4">Edit currently selected user in Starbugged</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update User Permissions Level</h6>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="{{ route('admin.update', $editeduser->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')


                                        <div class="form-group row">
                                            <label for="username"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="username" type="text"
                                                       class="form-control @error('username') is-invalid @enderror"
                                                       name="username" value="{{ $editeduser->username }}" required
                                                       autocomplete="" autofocus>

                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--<div class="form-group row">
                                            <label for="roles" class="col-md-4 col-form-label text-md-right">{ __('Assign Roles') }}</label>
                                         <div class="col-md-6">

                                            @ foreach ($roles as $role)

                                            <input type="checkbox" name="roles[]" id="roles"  value="{ $role->id }}">
                                            <label class="pr-2">{ $role->role_name }}</label>

                                            @ endforeach

                                                @ error('roles')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{ $message }}</strong>
                                                    </span>
                                                @ enderror
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="useraccountlevel"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('User Access Level') }}</label>

                                            <div class="col-md-6">
                                                <input id="useraccountlevel" type="text"
                                                       class="form-control @error('useraccountlevel') is-invalid @enderror"
                                                       name="useraccountlevel"
                                                       value="{{ $editeduser->useraccountlevel }}" required
                                                       autocomplete="" autofocus>

                                                @error('useraccountlevel')
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
                                                <a href="{{ route('admin.home') }}"
                                                   class="btn btn-danger">  {{ __('Cancel') }}</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>
@endsection
