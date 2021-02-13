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
                    <h1 class="h3 mb-2 text-gray-800">Create Project</h1>
                    <p class="mb-4">Create a new project / application</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Project Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="{{ route('project.store') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="project"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="project" type="text"
                                                       class="form-control @error('project') is-invalid @enderror"
                                                       name="project" value="{{ old('project') }}" required
                                                       autocomplete="Project Name" autofocus>

                                                @error('projectname')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="description"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                            <div class="col-md-6">
                                                <textarea type="text" rows="8" cols="50"
                                                          class="form-control @error('dexcription') is-invalid @enderror"
                                                          name="description" value="{{ old('description') }}" required
                                                          autocomplete="Project Description" autofocus></textarea>

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
                                                <a href="{{ route('dashboard') }}" class="btn btn-danger">  {{ __('Cancel') }}</a>
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

