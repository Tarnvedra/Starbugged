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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>User Name</th>
                                    <th>Job title</th>
                                    <th>Profile image</th>
                                    <th>About me</th>
                                </tr>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->job_title ?? "unknown"}}</td>
                                    <td>{{ $user->profile_image ?? "unknown"}}</td>
                                    <td>{{ $user->about_me ?? "unknown" }}</td>
                                </tr>
                            </table>
                            <a href="/admin/user/update" class="btn btn-success">  {{ __('Edit') }}</a>
                            <a href="/home" class="btn btn-info">  {{ __('Back') }}</a>
                    </div>
                </div>

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
