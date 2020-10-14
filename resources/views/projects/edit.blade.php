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
          <h1 class="h3 mb-2 text-gray-800">Edit Project</h1>
          <p class="mb-4">Edit currently selected project in Starbugged</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Update Project Data</h6>
            </div>
            <div class="card-body">
                <div class="sbp-preview">
                    <div class="sbp-preview-content">
                        <form action="/project/{{ $project->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

                                <div class="col-md-6">
                                    <input id="project" type="text" class="form-control @error('project') is-invalid @enderror" name="project" value="{{ $project->project }}" required autocomplete="Project Name" autofocus>

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
                                    <textarea  type="text" rows="8" cols="50" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $project->description }}" required autocomplete="Project Description" autofocus>{{ $project->description }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assignment" class="col-md-4 col-form-label text-md-right">{{ __('Staff Assignment') }}</label>

                                    <div class="col-md-6">

                                            <table class="table table-bordered">
                                            <tr>
                                                <th>User</th>
                                                <th class="pl-4">Assign</th>
                                                <th> Acc Level </th>

                                            </tr>
                                            @foreach($users as $user)

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
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Project') }}
                                    </button>
                                    <a href="/projects" class="btn btn-info">  {{ __('Back') }}</a>
                                </div>

                                </div>
                            </div>
                            </form>

                    </div>  </div>

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
