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
          <h1 class="h3 mb-2 text-gray-800">View Project Data</h1>
          <p class="mb-4">View project with all relevant data</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Project Data</h6>
            </div>
            <div class="card-body">
                <div class="sbp-preview">
                    <div class="sbp-preview-content">
                        <table class="table table-bordered table-hover">
                            <tr style="background-color: whitesmoke;">
                                <th>Project</th>
                                <th>Description</th>
                                <th>User(s) Assigned</th>
                                <th>Project Created at</th>
                                <th>Project Last Updated at</th>
                            <tr>

                            <tr>
                                <td>{{ $project->project }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->users_assigned}}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>{{ $project->updated_at }}</td>
                            </tr>


                        </table>
                        <a href="/projects" class="btn btn-info">  {{ __('All Projects') }}</a>
                        <a href="/issues" class="btn btn-danger">  {{ __('All Issues') }}</a>

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

    <div class="row pt-5">

        <div class="row pl-3">

        </div>

@endsection
