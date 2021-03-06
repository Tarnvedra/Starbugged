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
                    <h1 class="h3 mb-2 text-gray-800">View Profile</h1>
                    <p class="mb-4">view your current profile</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profile Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="{{ route('admin.profile.store') }}" enctype="multipart/form-data"
                                          method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row">
                                            <label for="jobtitle"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>

                                            <div class="col-md-6">
                                                <input id="jobtitle" type="text"
                                                       class="form-control @error('jobtitle') is-invalid @enderror"
                                                       name="jobtitle" value="{{ $user->job_title}}" required autofocus>

                                                @error('jobtitle')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="profileimage"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                                            <div class="col-md-6">
                                                <input id="profileimage" type="text"
                                                       class="form-control @error('profileimage') is-invalid @enderror"
                                                       name="profileimage" value="{{ $user->profile_image}}" autofocus>

                                                @error('profileimage')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="aboutme"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('About Me') }}</label>

                                            <div class="col-md-6">
                                                <input id="aboutme" type="text"
                                                       class="form-control @error('aboutme') is-invalid @enderror"
                                                       name="aboutme" value="{{ $user->about_me}}" autofocus>

                                                @error('aboutme')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-4 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update Profile') }}
                                                </button>
                                                <a href="{{ route('admin.profile') }}"
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
