<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar with Toggle and Header</title>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="{{ asset('css/adminhome.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="brand">
        <img src="{{ asset('images/logo-light.png') }}" alt="Logo">
    </div>
    <hr>
    <div class="profile">
    <img src="{{ asset('images/rr.jpg') }}" class="pp" alt="Profile Picture">
      <span>John Doe</span>
    </div>
    <hr>
    <div class="search-box">
        <input type="text" placeholder="Search" />
        <i class="fas fa-search"></i>
    </div>
    <hr>
    <ul>
      <li class="active">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
      </li>
      <li>
        <i class="fas fa-users"></i>
        <span>User Management</span>
      </li>
      <li>
        <i class="fas fa-bullhorn"></i>
        <span>Noticeboard</span>
      </li>
      <li>
        <i class="fas fa-calendar"></i>
        <span>Event Management</span>
      </li>
      <li>
        <i class="fas fa-images"></i>
        <span>Gallery</span>
      </li>
      <hr>
      <li>
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </li>
    </ul>
  </div>

  <!-- Header -->
  <header>
    <div class="toggle-sidebar">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="header-icons">
        <i class="fas fa-bell">
            <span class="badge">15</span>
        </i>
    </div>
  </header>

  <!-- Main Content -->
  <div class="main-content">
    <h1>Welcome to the Dashboard</h1>
  </div>

  <!-- JavaScript -->
  <script>
    const toggleSidebar = document.querySelector('.toggle-sidebar');
    const sidebar = document.querySelector('.sidebar');

    toggleSidebar.addEventListener('click', () => {
      sidebar.classList.toggle('minimized');
    });
  </script>
</body>
</html>
