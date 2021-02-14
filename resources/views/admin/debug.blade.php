@extends('layouts.app')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
    @include('include/sidebar')
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('include/topbar')
                <div class="card-body">
                    <div class="row">
                 <h3>Permissions Debug</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $('body').tooltip({
                selector: '[data-toggle="tooltip"]'
            });

        });
    </script>
@endpush
