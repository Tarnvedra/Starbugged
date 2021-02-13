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
                    <h1 class="h3 mb-2 text-gray-800">Tickets for:<b><i> {{ $project->project_name }}</i></b> project</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Ticket Data</h4>
                            <p class="mb-4">Showing all issues for:<b><i> {{ $project->project_name }}</i></b> project</p>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    @if(count($issues) > 0 )
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th>Issue ID</th>
                                                <th>OS</th>
                                                <th>Risk</th>
                                                <th>Issue</th>
                                                <th>Assignment</th>
                                                <th>Status</th>
                                                <th>Issue Created</th>
                                                <th>Last Updated</th>
                                            </tr>
                                            @foreach($issues as $issue)
                                                <tr>
                                                    <td> {{ $issue->id }}</td>
                                                    <td> {{ $issue->os }}</td>
                                                    <td> {{ $issue->risk }}</td>
                                                    <td> {{ $issue->issue }}</td>
                                                    <td> {{ $issue->assignment }}</td>
                                                    <td> {{ $issue->status }}</td>
                                                    <td> {{ $issue->created_at}}</td>
                                                    <td> {{ $issue->updated_at }}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                                <p> No issues found for this project..keep on coding!.. </p>
                                            @endif
                                        </table>
                                        {{ $issues->links() }}
                                        <div class="pl-3">
                                            <a href="{{ route('projects.home') }}" class="btn btn-info">  {{ __('Back') }}</a>
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
    </div>
@endsection
