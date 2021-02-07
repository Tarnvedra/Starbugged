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
                    <h1 class="h3 mb-2 text-gray-800">Project Task Board - {{ $project->project }}</h1>
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-3">
                                <h4>Backlog</h4>
                                <div class="jumbotron" style="border: 5px solid mediumvioletred;">

                                    @foreach($backlogs as $backlog)
                                        <div class="pb-5">
                                            <div class="card">
                                                <div class="card-header"
                                                     style="background-color: mediumvioletred; color:white;">
                                                    Task # <a href="{{ route('show.issue', ['id' => $backlog->id]) }}" style="color:whitesmoke; text-decoration: none">{{  $backlog->id  }}</a>&nbsp{{ $backlog->title }}</div>
                                                <div class="card-title pl-1">{{ $backlog->description }}</div>
                                                <div class="card-body">
                                                 Awaiting Assignment
                                                </div>
                                                <div class="card-footer">
                                                    Created By: {{ $backlog->user_id }}
                                                    <img class="img-profile rounded-circle" style="background-color: mediumvioletred;width: 30px; height:30px;">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-3">
                                <h4>Work In Progress</h4>
                                <div class="jumbotron" style="border: 5px solid orange;">
                                    @foreach($works as $work)
                                        <div class="pb-5">
                                            <div class="card">
                                                <div class="card-header" style="background-color: orange; color:white;">
                                                    Task # <a href="{{ route('show.issue', ['id' => $work->id]) }}" style="color:whitesmoke; text-decoration: none"> {{  $work->id  }}</a>&nbsp{{ $work->title }}</div>
                                                <div class="card-title pl-1">{{ $work->description }}</div>
                                                <div class="card-body">
                                                    {{ $work->assignment }}
                                                    <img class="img-profile rounded-circle" style="background-color: orange;width: 30px; height:30px;">
                                                </div>
                                                <div class="card-footer">
                                                    Created By: {{ $work->user_id }}
                                                    <img class="img-profile rounded-circle" style="background-color: orange;width: 30px; height:30px;">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-3">
                                <h4>Awaiting Feedback</h4>
                                <div class="jumbotron" style="border: 5px solid cadetblue;">
                                    @foreach($feedbacks as $feedback)
                                        <div class="pb-5">
                                            <div class="card">
                                                <div class="card-header"
                                                     style="background-color: cadetblue; color:white;">
                                                    Task # <a href="{{ route('show.issue', ['id' => $feedback->id]) }}" style="color:whitesmoke; text-decoration: none"> {{  $feedback->id  }}</a>&nbsp{{ $feedback->title }}</div>
                                                <div class="card-title pl-1">{{ $feedback->description }}</div>
                                                <div class="card-body">
                                                    {{ $feedback->assignment }}
                                                    <img class="img-profile rounded-circle" style="background-color: cadetblue;width: 30px; height:30px;">
                                                </div>
                                                <div class="card-footer">
                                                    Created By: {{ $feedback->user_id }}
                                                    <img class="img-profile rounded-circle" style="background-color: cadetblue; width: 30px; height:30px;">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-3">
                                <h4>Done</h4>
                                <div class="jumbotron" style="border: 5px solid darkseagreen;">
                                    @foreach($completions as $completion)
                                        <div class="pb-5">
                                            <div class="card">
                                                <div class="card-header"
                                                     style="background-color: darkseagreen; color:white;">
                                                    Task # <a href="{{ route('show.issue', ['id' => $completion->id]) }}" style="color:whitesmoke; text-decoration: none"> {{  $completion->id  }}</a>&nbsp{{ $completion->title }}</div>
                                                <div class="card-title pl-1">{{ $completion->description}}</div>
                                                <div class="card-body">
                                                    {{ $completion->assignment }}
                                                    <img class="img-profile rounded-circle" style="background-color: darkseagreen;width: 30px; height:30px;">
                                                </div>
                                                <div class="card-footer">
                                                    Created By: {{ $completion->user_id  }}
                                                    <img class="img-profile rounded-circle" style="background-color: darkseagreen; width: 30px; height:30px;">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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

    <!-- End of Page Wrapper -->
@endsection
