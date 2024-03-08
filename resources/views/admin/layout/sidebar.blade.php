<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
          <!-- Add icons to the links using the .nav-icon class 
               with font-awesome or any other icon font library -->
              @if(Session::get('page')=='dashboard')
                @php $active = "active" @endphp
              @else
                @php $active = "" @endphp
              @endif
          <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          @if(Session::get('page')=='users' || Session::get('page')=='create-users' || Session::get('page')=='roles' || Session::get('page')=='create-roles')
            @php 
              $active = "active";
              $fa_dot_circle = "fa-dot-circle";
            @endphp
          @else
            @php $active = "";
            $fa_dot_circle = "fa-circle";
             @endphp
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link {{$active}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=='users' || Session::get('page')=='create-users')
                @php 
                  $active = "active";
                  $fa_dot_circle = "fa-dot-circle";
                @endphp
              @else
                @php $active = "";
                $fa_dot_circle = "fa-circle";
                @endphp
              @endif
              
              <li class="nav-item">
                <a href="#" class="nav-link {{$active}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>
                    Users 
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @if(Session::get('page')=='users')
                    @php 
                      $active = "active";
                      $fa_dot_circle = "fa-dot-circle";
                    @endphp
                  @else
                    @php $active = "";
                    $fa_dot_circle = "fa-circle";
                    @endphp
                  @endif
                  <li class="nav-item">
                    <a href="{{url('admin/users')}}" class="nav-link {{$active}}">
                      <i class="far {{$fa_dot_circle}} nav-icon"></i>
                      <p>Users List</p>
                    </a>
                  </li>
                  
                  @if(Session::get('page')=='create-users')
                    @php 
                      $active = "active";
                      $fa_dot_circle = "fa-dot-circle";
                    @endphp
                  @else
                    @php $active = "";
                    $fa_dot_circle = "fa-circle";
                    @endphp
                  
                  <li class="nav-item">
                    <a href="{{url('admin/add-edit-user')}}" class="nav-link {{$active}}">
                      <i class="far {{$fa_dot_circle}} nav-icon"></i>
                      <p>Create User</p>
                    </a>
                  </li>
                  @endif
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Import Users</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              @if(Session::get('page')=='roles' || Session::get('page')=='create-roles')
                @php 
                  $active = "active";
                  $fa_dot_circle = "fa-dot-circle";
                @endphp
              @else
                @php $active = "";
                $fa_dot_circle = "fa-circle";
                @endphp
              @endif
              <li class="nav-item">
                <a href="#" class="nav-link {{$active}}">
                  <i class="fas fa-align-center"></i>
                  <p>
                    Roles 
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @if(Session::get('page')=='roles')
                    @php 
                      $active = "active";
                      $fa_dot_circle = "fa-dot-circle";
                    @endphp
                  @else
                    @php $active = "";
                    $fa_dot_circle = "fa-circle";
                    @endphp
                  @endif
                  <li class="nav-item">
                    <a href="{{url('admin/roles')}}" class="nav-link {{$active}}">
                      <i class="far {{$fa_dot_circle}} nav-icon"></i>
                      <p>Roles List</p>
                    </a>
                  </li>
                  @if(Session::get('page')=='create-roles')
                    @php 
                      $active = "active";
                      $fa_dot_circle = "fa-dot-circle";
                    @endphp
                  @else
                    @php $active = "";
                    $fa_dot_circle = "fa-circle";
                    @endphp
                  @endif
                  <li class="nav-item">
                    <a href="{{url('admin/add-edit-role')}}" class="nav-link {{$active}}">
                      <i class="far {{$fa_dot_circle}} nav-icon"></i>
                      <p>Create Role</p>
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>