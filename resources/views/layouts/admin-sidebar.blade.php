
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
  <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Griever.be <sup>{{Auth::user()->role->name}}</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="{{route('admin')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading
<!-- <div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Components</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Components:</h6>
      <a class="collapse-item" href="buttons.html">Buttons</a>
      <a class="collapse-item" href="cards.html">Cards</a>
    </div>
  </div>
</li> -->

<!-- Nav Item - Utilities Collapse Menu -->
<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Utilities</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Utilities:</h6>
      <a class="collapse-item" href="/admin/categories">Colors</a>
      <a class="collapse-item" href="utilities-border.html">Borders</a>
      <a class="collapse-item" href="utilities-animation.html">Animations</a>
      <a class="collapse-item" href="utilities-other.html">Other</a>
    </div>
  </div>
</li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
<!-- <div class="sidebar-heading"> -->
  <!-- Addons
</div> -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Login Screens:</h6>
      <a class="collapse-item" href="login.html">Login</a>
      <a class="collapse-item" href="register.html">Register</a>
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
  </div>
</li> -->

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li> --> 

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTables" aria-expanded="true" aria-controls="collapseTables">
    <i class="fas fa-fw fa-table"></i>
    <span>Tables</span>
  </a>

  <div id="collapseTables" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users:</h6>
          {{-- <a class="collapse-item" href="{{route('users.create')}}">Create User</a> --}}
          <a class="collapse-item" href="{{route('users.index')}}">Users</a>
          <a class="collapse-item" href="{{route('roles.index')}}">Roles</a>
          <div class="collapse-divider"></div>
        <h6 class="collapse-header">Comics:</h6>
          <a class="collapse-item" href="{{route('comics.index')}}">Comics</a>
          <a class="collapse-item" href="{{route('authors.index')}}">Authors</a>
          <a class="collapse-item" href="{{route('series.index')}}">Series</a>
          <a class="collapse-item" href="{{route('publishers.index')}}">Publishers</a>
          <a class="collapse-item" href="{{route('genres.index')}}">Genres</a>
      {{-- <div class="collapse-divider"></div>
        <h6 class="collapse-header">Roles:</h6>
          <a class="collapse-item" href="{{route('roles.create')}}">Create Role</a>
          <a class="collapse-item" href="{{route('roles.index')}}">All Roles</a>
        
      <div class="collapse-divider"></div>
        <h6 class="collapse-header">Categories:</h6>
          <a class="collapse-item" href="{{route('categories.create')}}">Create Category</a>
          <a class="collapse-item" href="{{route('categories.index')}}">All Categories</a>

      <div class="collapse-divider"></div>
        <h6 class="collapse-header">Products:</h6>
          <a class="collapse-item" href="{{route('products.create')}}">Create Product</a>
          <a class="collapse-item" href="{{route('products.index')}}">All Products</a>

      <div class="collapse-divider"></div>
        <h6 class="collapse-header">Genres:</h6>
          <a class="collapse-item" href="{{route('genres.create')}}">Create Genre</a>
          <a class="collapse-item" href="{{route('genres.index')}}">All Genre</a> --}}

    </div>

    
  


    

  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
