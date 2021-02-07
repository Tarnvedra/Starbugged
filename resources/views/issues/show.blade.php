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
          <h1 class="h3 mb-2 text-gray-800">Issue No: #{{ $issue->id }}</h1>
          <p class="mb-4">Showing ticket data for issue #{{ $issue->id }}</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ticket Data</h6>
            </div>
            <div class="card-body">
                <div class="sbp-preview">
                    <div class="sbp-preview-content">
                        <table class="table table-bordered table-hover">
                            <tr style="background-color: whitesmoke;">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Issue ID</th>
                                        <th>Project ID</th>
                                        <th>OS</th>
                                        <th>Risk</th>
                                        <th>Issue </th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Assignment</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Last Updated</th>

                                    </tr>

                            <tr>

                                    <tr>
                                        <td> {{  $issue->id  }}</td>
                                        <td> {{ $issue->project_id }}</td>
                                        <td> {{ $issue->os }}</td>
                                        <td> {{ $issue->risk }}</td>
                                        <td> {{ $issue->issue }}</td>
                                        <td> {{ $issue->title }}</td>
                                        <td> {{ $issue->description }}</td>
                                        <td> {{ $issue->assignment }}</td>
                                        <td> {{ $issue->status }}</td>
                                        <td> {{ $issue->created_at}}</td>
                                        <td> {{ $issue->updated_at }}</td>
                                    </tr>


                        </table>
                        <a href="/issue/{{ $issue->id }}/edit" class="btn btn-success">  {{ __('Update Issue') }}</a>
                        <a href="/issues" class="btn btn-info">  {{ __('Back') }}</a>
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
