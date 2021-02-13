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
                    <h1 class="h3 mb-2 text-gray-800">Project Task Board - {{ $project->project_name }}</h1>
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
                                                    Task # <a href="{{ route('issue.show', ['id' => $backlog->id]) }}" style="color:whitesmoke; text-decoration: none">{{  $backlog->id  }}</a>&nbsp<i>{{ $backlog->title }}</i></div>
                                                <div class="card-title pt-3 text-center">{{ $backlog->description }}</div>
                                                <div class="card-body text-center">
                                                 Awaiting Assignment
                                                </div>
                                                <div class="card-footer">
                                                    <img class="img-profile rounded-circle" src="{{ asset($backlog->user->profile_image) }}" alt="" style="width: 30px; height:30px;"> {{$backlog->user->name }} <br>
                                                    <br>Created: {{ $backlog->created_at->diffForHumans() }}
                                                    <br>Updated: {{ $backlog->updated_at->diffForhumans() }}
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
                                                <div class="card-header"
                                                     style="background-color: orange; color:white;">
                                                    Task # <a href="{{ route('issue.show', ['id' => $work->id]) }}" style="color:whitesmoke; text-decoration: none">{{  $work->id  }}</a>&nbsp<i>{{ $work->title }}</i></div>
                                                <div class="card-title pt-3 text-center">{{ $work->description }}</div>
                                                <div class="card-body">
                                                    <img class="img-profile rounded-circle" src="{{ asset('/images/users/'.$work->assignment.'.jpg') }}" style="width: 30px; height:30px;">
                                                    {{ $work->assignment }}
                                                </div>
                                                <div class="card-footer">
                                                    <img class="img-profile rounded-circle" src="{{ asset($work->user->profile_image) }}" style="width: 30px; height:30px;"> {{$work->user->name }} <br>
                                                    <br>Created: {{ $work->created_at->diffForHumans() }}
                                                    <br>Updated: {{ $work->updated_at->diffForhumans() }}
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
                                                    Task # <a href="{{ route('issue.show', ['id' => $feedback->id]) }}" style="color:whitesmoke; text-decoration: none">{{  $feedback->id  }}</a>&nbsp<i>{{ $feedback->title }}</i></div>
                                                <div class="card-title pt-3 text-center">{{ $feedback->description }}</div>
                                                <div class="card-body">
                                                    <img class="img-profile rounded-circle" src="{{ asset('/images/users/'.$feedback->assignment.'.jpg') }}" style="width: 30px; height:30px;">
                                                    {{ $feedback->assignment }}
                                                </div>
                                                <div class="card-footer">
                                                    <img class="img-profile rounded-circle" src="{{ asset($feedback->user->profile_image) }}" style="width: 30px; height:30px;"> {{$feedback->user->name }} <br>
                                                    <br>Created: {{ $feedback->created_at->diffForHumans() }}
                                                    <br>Updated: {{ $feedback->updated_at->diffForhumans() }}
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
                                                    Task # <a href="{{ route('issue.show', ['id' => $completion->id]) }}" style="color:whitesmoke; text-decoration: none">{{  $completion->id  }}</a>&nbsp<i>{{ $completion->title }}</i></div>
                                                <div class="card-title pt-3 text-center">{{ $completion->description }}</div>
                                                <div class="card-body">
                                                    <img class="img-profile rounded-circle" src="{{ asset('/images/users/'.$completion->assignment.'.jpg') }}" style="width: 30px; height:30px;">
                                                    {{ $completion->assignment }}
                                                </div>
                                                <div class="card-footer">
                                                    <img class="img-profile rounded-circle" src="{{ asset($completion->user->profile_image) }}" style="width: 30px; height:30px;"> {{$completion->user->name }} <br>
                                                    <br>Created: {{ $completion->created_at->diffForHumans() }}
                                                    <br>Updated: {{ $completion->updated_at->diffForhumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
