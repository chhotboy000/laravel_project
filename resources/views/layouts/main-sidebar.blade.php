 {{-- sidebar --}}
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if(Auth::user()->role == 1)
    <a href="{{url('admin/home')}}" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" >
      <span class="brand-text font-weight-light">TuTam Hospital</span>
    </a>
    @endif
    @if(Auth::user()->role == 2)
    <a href="{{url('fdoctor/home')}}" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" >
      <span class="brand-text font-weight-light">TuTam Hospital</span>
    </a>
    @endif
    @if(Auth::user()->role == 3)
    <a href="{{url('fnurse/home')}}" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" >
      <span class="brand-text font-weight-light">TuTam Hospital</span>
    </a>
    @endif
    @if(Auth::user()->role == 4)
    <a href="{{url('frecept/home')}}" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" >
      <span class="brand-text font-weight-light">TuTam Hospital</span>
    </a>
    @endif
    @if(Auth::user()->role == 5)
    <a href="{{url('fpharma/home')}}" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" >
      <span class="brand-text font-weight-light">TuTam Hospital</span>
    </a>
    @endif
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
          @if(Auth::user()->role == 1)
            <li class="nav-item menu-open">
              <a href="#" class="nav-link @if(Request::segment(2) == 'nurse') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Service
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/nurse/service/index')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Service Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/nurse/service/create')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add service</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/nurse/treatser_index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>list service treatment</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link @if(Request::segment(2) == 'user') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Admin
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/user/index')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/user/create')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link @if(Request::segment(2) == 'patient') active @endif" id="patient-menu">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                      Patient
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/patient/index')}}" class="nav-link sidebar-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Patient List</p>
                  </a>
              </li>
                <li class="nav-item">
                  <a href="{{url('admin/patient/create')}}" class="nav-link sidebar-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Patient</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open @if(Request::segment(2) == 'schedule') active @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Schedule and Event
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/schedule/creSche')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Schedule Index</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/schedule/editSche')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Update Schedule</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/creEvent')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Event</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open @if(Request::segment(2) == 'receptionist') active @endif">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Receptionist
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/recept/index')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Checkout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/recept/finish')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Finish</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-open @if(Request::segment(2) == 'doctor') active @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Treatment
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/doctor/index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Patient List</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item menu-open @if(Request::segment(2) == 'pharma') active @endif">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Medicine
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/pharma/treatmed')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>list medicine treatment</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/pharma/medicine')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>list medicine</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/pharma/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Medicine</p>
                  </a>
                </li>
              </ul>
            </li>
          @elseif(Auth::user()->role == 2)
          <li class="nav-item menu-open @if(Request::segment(2) == 'fdoctor') active @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Treatment
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('fdoctor/index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient List</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 3)
          <li class="nav-item menu-open">
            <a href="#" class="nav-link @if(Request::segment(2) == 'fnurse') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Service
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('fnurse/service/index')}}" class="nav-link sidebar-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('fnurse/service/create')}}" class="nav-link sidebar-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('fnurse/treatser_index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list service treatment</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 4)
          <li class="nav-item menu-open">
            <a href="#" class="nav-link @if(Request::segment(2) == 'patient') active @endif" id="patient-menu">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Patient
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('frecept/patient/index')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Patient List</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('frecept/patient/create')}}" class="nav-link sidebar-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Patient</p>
                </a>
            </li>
            </ul>
          </li>
          <li class="nav-item menu-open @if(Request::segment(2) == 'frecept') active @endif">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Receptionist
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('frecept/index')}}" class="nav-link sidebar-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Checkout</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('frecept/finish')}}" class="nav-link sidebar-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Finish</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->role == 5)
          <li class="nav-item menu-open @if(Request::segment(2) == 'pharma') active @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Medicine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('fpharma/treatmed')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list medicine treatment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('fpharma/medicine')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list medicine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('fpharma/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Medicine</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('chatify')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>chat</p>
             </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


