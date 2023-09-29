<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; width: 250px;">
  <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sumanas.</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset('uploads/users/' . Auth::user()->photo) }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block text-decoration-none">{{Auth::user()->name}}</a>
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
              <li class="nav-item">
                  <a href="{{ route('dashboard.index') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Dashboard
                      </p>
                  </a>
              </li>
              <li class="nav-item {{ Request::is('admin/category*') || Request::is('admin/post*') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ Request::is('admin/category*') || Request::is('admin/post*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tools"></i>
                      <p>
                          Category
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('category.index') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>View Category</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('category.create') }}" class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Category</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item {{ Request::is('admin/post*') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ Request::is('admin/post*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-address-card"></i>
                      <p>
                          Post
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('post.index') }}" class="nav-link {{ Request::is('admin/post') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>View Post</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('post.create') }}" class="nav-link {{ Request::is('admin/post/create') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Post</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                          Users
                      </p>
                  </a>
              </li>
          </ul>
      </nav>
  </div>
</aside>
