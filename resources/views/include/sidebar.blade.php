<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Starbugged</div>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="sidebar-heading">
        Projects
    </li>

@can('admin.view')
    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Administration</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Administration Tasks:</h6>
                    @can('admin.create.project')
                        <a class="collapse-item" href="{{ route('project.create') }}">Create Project</a>
                    @endcan
                    <a class="collapse-item" href="#">Assign Issues</a>
                    <a class="collapse-item" href="{{ route('admin.home') }}">User Management</a>
                    @can('admin.update.project_users')
                        <a class="collapse-item" href="{{ route('project.assign') }}">Assign Users</a>
                    @endcan
                    @can('admin.permissions')
                        <a class="collapse-item" href="{{ route('admin.permissions') }}">Admin Permissions</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Projects</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Project Tasks</h6>
                <a class="collapse-item" href="{{ route('projects.home') }}">View All Projects</a>
                @can('admin.delete.project')
                    <a class="collapse-item" href="#">Delete Project</a>
                @endcan
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIssues" aria-expanded="true"
           aria-controls="collapseIssues">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Issues</span>
        </a>
        <div id="collapseIssues" class="collapse" aria-labelledby="headingIssues" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ticket Tasks</h6>
                <a class="collapse-item" href="{{ route('issues.home') }}">View All</a>
                <a class="collapse-item" href="{{ route('issues.priority') }}">By Priority</a>
                <a class="collapse-item" href="{{ route('issues.status') }}">By Status</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="sidebar-heading">
        User Tasks
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tasks</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tickets</h6>
                <a class="collapse-item" href="{{ route('issues.assigned') }}">Assigned to Me</a>
                <a class="collapse-item" href="{{ route('issues.reported') }}">Reported by Me</a>
                <a class="collapse-item" href="#">Recently Viewed</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('watch.home') }}">
            <i class="fas fa-fw fa-eye"></i>
            <span>Watching</span></a>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.profile') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                  document.getElementById('side-logout-form').submit();">
            <i class="fas fa-fw fa-times-circle"></i>
            <span>Fast Logout</span></a>
        <form id="side-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </li>
</ul>
<!-- Sidebar Toggler (Sidebar) -->

<!-- End of Sidebar -->
