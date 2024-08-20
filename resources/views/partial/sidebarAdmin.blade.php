<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
</head>

<body>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboardadmin') }}">
                  <i class="mdi mdi-view-dashboard"></i>
                  <span class="menu-title" >Dashboard</span>
              </a>
          </li>
      <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('alumniadmin') }}">
                    <i class="mdi mdi-school"></i>
                    <span class="menu-title" >Data Alumni</span>
                </a>
            </li>
      <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('akunperusahaan') }}">
                        <i class="mdi mdi-office-building"></i>
                        <span class="menu-title" >Data Perusahaan</span>
                    </a>
                </li>
      <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('akunpengguna') }}">
                        <i class="mdi mdi-account"></i>
                        <span class="menu-title" >Akun Pengguna</span>
                    </a>
                </li>
      <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lokeradmin') }}">
                        <i class="mdi mdi-briefcase"></i>
                        <span class="menu-title" >Data Loker</span>
                    </a>
                </li>
      </ul>


  </nav>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
