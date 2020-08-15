<div class="sidenav pt-5">
    <a href="/home">Dashboard</a>
    <a href="/projects">Projects</a>
    <a href="/issues">Issues</a>
    <a href="#">Notifications</a>
    @if ($user->useraccountlevel >= 60)
    <a href="/admin">Administration</a>
    @endif
    <p class="wl">&nbsp&nbsp&nbsp&nbsp---------------------------</p>
    <a href="#">Assigned to Me</a>
    <a href="#">Reported by Me</a>
    <a href="#">Recently viewed</a>
    <a href="#">Watching</a>
  </div>
