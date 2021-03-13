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
                    <h1 class="h3 mb-2 text-gray-800">Issue No: #{{ $issue->id }} {{ $issue->title }}</h1>
                    <p class="mb-4">Showing ticket data for issue #{{ $issue->id }}</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ticket Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Issue ID</th>
                                            <th>Project ID</th>
                                            <th>OS</th>
                                            <th>Risk</th>
                                            <th>Issue</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Assignment</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Last Updated</th>

                                        </tr>
                                        <tr>
                                            <td> {{ $issue->id }}</td>
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
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-title">
                            <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Ticket Comments</h6>
                        </div>
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    @if($comments !==null)
                                        @foreach($comments as $comment)

                                            <div class="card-header">
                                        <div class="card-body">
                                            {{ $comment->body }}
                                        <div class="card-footer">
                                            <img class="img-profile rounded-circle" src="{{ asset($comment->user->profile_image) }}" alt="" style="width: 30px; height:30px;">  {{ $comment->user->name }}
                                            <div class="pull-right">
                                            {{ $comment->created_at->toDayDateTimeString() }}
                                            </div>
                                        </div>
                                            </div>
                                            </div>
                                            @endforeach
                                    @else
                                        <div>Currently this ticket has no comments</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>





                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Ticket Actions</h6>
                          </div>
                          <div class="card-body">
                              <div class="sbp-preview">
                                  <div class="sbp-preview-content">
                                        <a href="{{ route('issue.edit', $issue->id) }}"
                                           class="btn btn-success">  {{ __('Edit Issue') }}</a>
                                      <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#comment-create" >Add Comment</a>

                                      <a href="{{ route('issues.home') }}" class="btn btn-info">  {{ __('Back') }}</a>
                                      <createcomment-component route="{{ route('issue.comment.create', $issue->id ) }}" token="{{ csrf_token() }}"></createcomment-component>
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

    @include('issues.modals.create')
    @include('issues.modals.edit')
@endsection
