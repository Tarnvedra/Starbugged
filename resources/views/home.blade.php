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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <!--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Projects Card-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $projectsCount }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Issues Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Issues</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $issues }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bug fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Status Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">By Status Unresolved</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $status }}</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">

                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $statusPercentage }}%" aria-valuenow="{{ $statusPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>

                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">

                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $statusPercentage }}%</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Priority Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">By High Priority</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $priority }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $priorityPercentage }}%</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
 <piechart-component></piechart-component>
          <div class="row">


            <div class="col-xl-12 col-lg-9 col-md-3">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Projects Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Project Actions</div>
                      <a class="dropdown-item" href="/projects">View All Projects</a>
                      <a class="dropdown-item" href="#">Create A Project</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"></a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered table-hover">
                            <tr style="background-color: whitesmoke;">
                                <th>#</th>
                                <th>Project</th>
                                <th>Description</th>
                                <th>Staff Assigned</th>
                                <th>Project Start</th>
                                <th>Last Updated</th>

                            <tr>
                    @foreach($projects as $project)
                            <tr>
                                <td><a href="/project/{{ $project->id }}">{{ $project->id }}</a></td>
                                <td>{{ $project->project }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->users_assigned}}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>{{ $project->updated_at }}</td>
                            </tr>

                    @endforeach
                        </table>
                        {{ $projects->links() }}
                    </div>


                </div>
              </div>
            </div>



          <!-- Content Row -->


        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @include('include/footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->


  @endsection
