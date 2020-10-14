 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <i class="fas fa-tasks"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Starbugged</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/home">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Projects
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Administration</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Administration Tasks:</h6>
          <a class="collapse-item" href="/project/create">Create Project</a>
          <a class="collapse-item" href="#">Assign Issues</a>
          <a class="collapse-item" href="/admin/users">User Management</a>
          <a class="collapse-item" href="#">Assign Users</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Projects</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Project Tasks</h6>
            <a class="collapse-item" href="/projects">View All Projects</a>
            <a class="collapse-item" href="#">Update Projects</a>
            <a class="collapse-item" href="#">Delete Project</a>
          </div>
        </div>
      </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIssues" aria-expanded="true" aria-controls="collapseIssues">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Issues</span>
      </a>
      <div id="collapseIssues" class="collapse" aria-labelledby="headingIssues" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Ticket Tasks</h6>
          <a class="collapse-item" href="/issues">View All</a>
          <a class="collapse-item" href="/priority">By Priority</a>
          <a class="collapse-item" href="/status">By Status</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      /&nbsp;Current User: {{ $user->name }}&nbsp;\
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Tasks</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Tickets</h6>
          <a class="collapse-item" href="#">Assigned to Me</a>
          <a class="collapse-item" href="#">Reported by Me</a>
          <a class="collapse-item" href="#">Recently Viewed</a>
        </div>
      </div>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="#">
      <i class="fas fa-fw fa-eye"></i>
      <span>Watching</span></a>
    </li>



    <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="#">
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

   <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
