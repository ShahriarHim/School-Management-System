<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ekattor 7 | Dashboard</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>


<body class="hold-transition sidebar-mini layout-fixed">

  {{----NavBar----}}
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="position: fixed !important; top: 0; width: 100%; z-index: 1030;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a id="togglebtn1" {{-- onclick="SidebarShow()" --}} class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      </li>
    </ul>
</nav>


  {{-- Asside --}}
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar1">
    <a href="/admin" class="brand-link">
      <img src="{{ asset('dist/img/logoB.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">Ekattor 7</span>
    </a>

    {{-- SideBar --}}
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/rr.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Rishita</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin/users" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/noticeboard" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Notice Management
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="events-management" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Events Management
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.galleries.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Gallery
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.page-content.create')}}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Manage Page Content
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.school.create')}}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Manage school
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.school.index')}}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                school info
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
             Logout
            </p>
            </a>
          </li>

        </ul>
      </nav>

    </div>
  </aside>


  <div class="main" {{-- onclick="closeToggle()" --}}>
    <main class="main-content">
      @yield('content')
    </main>
  </div>


  <footer class="main-footer">
    <strong>Copyright &copy; 2024-Present <a href="/admin">Ekattor 7</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>
  </div>
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
  <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <!-- <script src="{{ asset('dist/js/demo.js') }}"></script> -->
  <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
  {{-- <script>
    function closeToggle() {
        const x = document.getElementById("sidebar1");
        x.style.display = 'none';
    }
    function SidebarShow(){
        const x = document.getElementById("sidebar1");
        if(x.style.display = 'none'){
            x.style.display = 'block';
        }
    }
</script> --}}
</body>

</html>
