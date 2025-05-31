<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      @auth
      <a href="#" class="d-block">
        {{ Auth::user()->name }} ({{ Auth::user()->profile->age}})
      </a>
      @endauth

      @guest
      <a href="#" class="d-block">Belum login</a>
      @endguest
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Dashboard Link -->
      <li class="nav-item">
        <a href="/" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>

      <!-- Table Link with Submenu -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Table
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/table" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Table</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data-table" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Table</p>
            </a>
          </li>
        </ul>
      </li>

      <!-- Film Link -->
      <li class="nav-item">
        <a href="/film" class="nav-link">
          <i class="nav-icon fas fa-film"></i>
          <p>Film</p>
        </a>
      </li>

      <!-- Genre Link -->
      @auth
      <li class="nav-item">
        <a href="/genre" class="nav-link">
          <i class="nav-icon fas fa-tags"></i>
          <p>Genre</p>
        </a>
      </li>
      @endauth

      <!-- Authentication Links -->
      @guest
      <!-- Login Button for Guest -->
      <li class="nav-item">
        <a href="/login" class="nav-link bg-info text-white">
          <i class="nav-icon fas fa-sign-in-alt"></i>
          <p>Login</p>
        </a>
      </li>
      @endguest

      @auth
      <li class="nav-item">
        <a href="/profile" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>Profile</p>
        </a>
      </li>

      <!-- Logout Button for Authenticated User -->
      <li class="nav-item">
        <a class="nav-link bg-danger text-white" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
      @endauth
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
