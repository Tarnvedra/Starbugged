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
          <h1 class="h3 mb-2 text-gray-800">Projects</h1>
          <p class="mb-4">Displaying all projects for user Assignment</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Assign Projects</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <th>ID</th>
                    <th>Project</th>
                    <th>Description</th>
                    @if ($user->useraccountlevel >= 60)
                    <th>Assign Users<th>

                    @endif

                <tr>
        @foreach($projects as $project)
                <tr>
                    <td><a href="/project/{{ $project->id }}">{{ $project->id }}</a></td>
                    <td>{{ $project->project }}</td>
                    <td>{{ $project->description }}</td>
                    @if ($user->useraccountlevel >= 60)
                    <td>
                        <a href="/projects/assignment/{{ $project->id }}" class="btn btn-success">  {{ __('Assign') }}</a>
                    </td>
                    @endif



                </tr>

        @endforeach
            </table>
            {{ $projects->links() }}

                <div class="pl-3">
                <a href="/home" class="btn btn-info">  {{ __('Back') }}</a>
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
