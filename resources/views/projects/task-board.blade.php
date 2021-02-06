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
                    <h1 class="h3 mb-2 text-gray-800">Project Task Board: Project - {{ $project->project }}</h1>
                    <div class="jumbotron">
                    <div class="row">
                        <div class="col-3">
                            <h4>Backlog</h4>
                            <div class="jumbotron" style="background-color: mediumvioletred;">

                            @foreach($backlogs as $backlog)
                                <div class="card-title">Task # {{ $backlog->id }}</div>
                                <div class="card-body">
                           {{ $backlog->description }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                        <div class="col-3">
                            <h4>Work In Progress</h4>
                            <div class="jumbotron" style="background-color: orange;">

                                @foreach($works as $work)
                                    <div class="card-title">Task # {{ $work->id }}</div>
                                    <div class="card-body">
                                        {{ $work->description }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-3">
                            <h4>Awaiting Feedback</h4>
                            <div class="jumbotron" style="background-color: cadetblue;">

                                @foreach($feedbacks as $feedback)
                                    <div class="card-title">Task # {{ $feedback->id }}</div>
                                    <div class="card-body">
                                        {{ $feedback->description }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-3">
                            <h4>Done</h4>
                            <div class="jumbotron" style="background-color: darkseagreen;">

                                @foreach($completions as $completion)
                                    <div class="card-title">Task # {{ $completion->id }}</div>
                                    <div class="card-body">
                                        {{ $completion->description }}
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

    </div>
    <!-- End of Page Wrapper -->

@endsection
