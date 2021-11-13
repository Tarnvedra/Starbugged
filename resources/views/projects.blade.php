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
                    <h1 class="h3 mb-2 text-gray-800">All Projects</h1>
                    <p class="mb-4">Displaying all projects...</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <th>ID</th>
                                    <th>Project</th>
                                    <th>Description</th>
                                    @can('admin.update.project')
                                        <th>Edit Project</th>
                                    @endcan
                                    @can('project.issue.create')
                                        <th>Create Issue</th>
                                    @endcan
                                    @can('project.issues.view')
                                        <th>View Issues</th>
                                    @endcan
                                    @can('project.view.taskboard')
                                        <th>Project Overview</th>
                                    @endcan
                                    <tr>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td><a href="{{ route('project.show', $project->id) }}">{{ $project->id }}</a></td>
                                            <td><a href="{{ route('project.show', $project->id) }}">{{ $project->project_name}}</a></td>
                                            <td>{{ $project->description }}</td>
                                            @can('admin.update.project')
                                                <td>
                                                    <a href="{{ route('project.edit', $project->id) }}"
                                                       class="btn btn-outline-info">  {{ __('Edit') }}</a>
                                                </td>
                                            @endcan
                                            @can('project.issue.create')
                                                <td>
                                                    <a href="{{ route('issue.create' , $project->id) }}"
                                                       class="btn btn-outline-primary">  {{ __('Create') }}</a>
                                                </td>
                                            @endcan
                                            @can('project.issues.view')
                                                <td>
                                                    <a href="{{ route('issues.project', $project->id) }}"
                                                       class="btn btn-outline-warning">  {{ __('View') }}</a>
                                                </td>
                                            @endcan
                                            @can('project.view.taskboard')
                                                <td>
                                                    <a href="{{ route('taskboard', ['project' => $project]) }}"
                                                       class="btn btn-outline-success">  {{ __('Taskboard') }}</a>
                                                </td>
                                            @endcan
                                        </tr>

                                    @endforeach
                                </table>
                                {{ $projects->links() }}

                                <div class="pl-3">
                                    <a href="{{ route('dashboard') }}" class="btn btn-info">  {{ __('Back') }}</a>
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
