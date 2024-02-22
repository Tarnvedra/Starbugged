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
                    <h1 class="h3 mb-2 text-gray-800">Edit Comment</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Comment</h6>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <form action="{{ route('issue.comment.update', ['comment' => $comment]) }}"
                                          method="post">
                                        @method('PATCH')
                                        @csrf

                                        <div class="form-group row">
                                            <label for="body" class="col-md-8 control-label">Comment Text</label>
                                            <div class="col-md-8">
                                                <textarea id="issue_body_comment" name="issue_body_comment" rows="10"  cols="150">{{ $comment->body }}</textarea>
                                            </div>
                                        </div>



                                        <div class="form-group row mb-0">
                                            <div class="col-md-4 offset-md-4">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    {{ __('Update Comment') }}
                                                </button>
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="{{ route('projects.home') }}"
                                                   class="btn btn-info">  {{ __('Back') }}</a>
                                            </div>

                                        </div>
                                    </form>

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
