@extends('layouts/app')


@section('content')
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
                    <h1 class="h3 mb-2 text-gray-800">Assign Users to Project</h1>
                    <p class="mb-4">Show and update users assigned to project</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Project Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="{{ route('projects.assign.update.users', $project->id) }}"
                                          enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('PATCH')

                                        <div class="form-group row">
                                            <label for="project"
                                                   class="col-md-4 col-form-label text-md-right">{{ __(' Project: ') }}
                                                <i><b>{{ $project->project }}</b></i></label>
                                        </div>

                                        <div class="form-group row d-flex">
                                            <label for="assignment"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Staff Assignment') }}</label>
                                            <div class="col-md-4">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Currently Assigned</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $project->users_assigned }}</td>

                                                </table>

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>User</th>
                                                        <th class="pl-4">Assign</th>
                                                    </tr>
                                                    <tr>
                                                        @foreach($users as $user)
                                                            @can('admin.update.project')
                                                                <td>{{ $user->username }}</td>
                                                                <td><input type="checkbox" id="assignment"
                                                                           name="assignment[]"
                                                                           class="form-control @error('assignment') is-invalid @enderror"
                                                                           value="{{ $user->username }}" autocomplete=""
                                                                           autofocus></td>
                                                            @endcan
                                                    </tr>
                                                    @endforeach
                                                </table>
                                                @error('assignment')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <br>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-4 offset-md-4  ">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Update Project') }}
                                                    </button>
                                                    <a href="{{ route('projects.home') }}"
                                                       class="btn btn-info">  {{ __('Back') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
@endsection



