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
                    <h1 class="h3 mb-2 text-gray-800">Issues</h1>
                    <p class="mb-4">Displaying all issues for all projects...</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tickets</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Ticket ID</th>
                                        <th>Project ID</th>
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
                                            <td><a href="issue/{{ $issue->id}}">{{  $issue->id  }}</a></td>
                                            <td><a href="project/{{$issue->project_id}}">{{ $issue->project_id  }}</a>
                                            </td>
                                            <td> {{ $issue->os }}</td>
                                            <td> {{ $issue->risk }}</td>
                                            <td> {{ $issue->issue }}</td>
                                            <td> {{ $issue->assignment }}</td>
                                            <td> {{ $issue->status }}</td>
                                            <td> {{ $issue->created_at}}</td>
                                            <td> {{ $issue->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                {{ $issues->links() }}
                                <div class="pl-3">
                                    <a href="{{ route('/home") }}" class="btn btn-info">  {{ __('Back') }}</a>
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
@endsection
