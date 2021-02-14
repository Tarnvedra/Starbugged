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
                <div class="container-fluid">

                    <div class="card-body">
                        <div class="row">
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th>Permission</th>
                                    @foreach($roles as $role)
                                        <th>{{ $role->name }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td><span style="font-family: monospace">{{ $permission->name }}</span></td>
                                        @foreach($roles as $role)
                                            <?php /** @var $role \Spatie\Permission\Models\Role */ ?>
                                            <td>
                                                @if($role->hasPermissionTo($permission))
                                                    <span class="text-green" style="color:darkseagreen;">Yes</span>
                                                @else
                                                    <span class="text-red" style="color:red;">No</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card-body">
                            <h4>Roles</h4>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Users</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach($role->users as $user)
                                                {{ $user->name }}<br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card-body">
                            <h4>Direct Permissions</h4>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Extra Permissions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach($user->permissions as $permission)
                                                <span style="font-family: monospace">{{ $permission->name }}</span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
