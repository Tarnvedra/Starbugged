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
                    <h1 class="h3 mb-2 text-gray-800">Manage Users</h1>
                    <p class="mb-4">Displaying all users...</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <usertable-component route="{{ route('table.users') }}"></usertable-component>
                                <div class="col-sm-4">
                                    <a href="{{ route('dashboard') }}" class="btn btn-info">  {{ __('Back') }}</a>
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

@push('scripts')
    <script>
        $(document).ready(function () {
        });
    </script>
@endpush







