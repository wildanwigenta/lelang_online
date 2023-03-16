
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}" class="brand-link">
      <img src="{{ asset('admin-lte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Lelang Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('image') }}/user/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}" class="d-block">{{ Auth::user()->level }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">             
          <li class="nav-item">
            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}" class="nav-link {{ $sidebar == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(Auth::user()->level == 'admin')
          <li class="nav-item">
            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/user" class="nav-link {{ $sidebar == 'user' ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>User</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/barang" class="nav-link {{ $sidebar == 'barang' ? 'active' : '' }}">
              <i class="nav-icon fas fa-box-open"></i>
              <p>Barang</p>
            </a>
          </li>
          @if(Auth::user()->level == 'petugas')
          <li class="nav-item">
            <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'petugas' }}/lelang" class="nav-link {{ $sidebar == 'lelang' ? 'active' : '' }}">
              <i class="nav-icon fas fa-university"></i>
              <p>Lelang</p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      
    </div>
    <!-- /.sidebar -->
  </aside>