<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FIELDWORK PLATFORM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .card-header-custom {
      background-color: #f7f7f7;
      border-bottom: 2px solid #e0e0e0;
      padding: 15px;
    }
    .table th, .table td {
      vertical-align: middle;
      text-align: center;
    }
    .action-icon {
      font-size: 1.2rem;
      cursor: pointer;
      color: #0d6efd;
    }
    .action-icon:hover {
      color: #0a58ca;
    }
    .breadcrumb-item a {
      color: #0d6efd;
      text-decoration: none;
    }
    .breadcrumb-item a:hover {
      color: #0a58ca;
    }
    .attendance-icon {
      font-size: 1.5rem;
      cursor: pointer;
    }
    .attendance-icon.attended {
      color: #198754;
    }
    .attendance-icon.not-attended {
      color: #dc3545;
    }
    .attendance-icon:hover {
      opacity: 0.8;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">FIELDWORK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('post')}}">
          <i class="bi bi-credit-card"></i>
          <span>Fieldwork Post</span>
        </a>
      </li><!-- End Payment Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('applicant-attendance')}}">
          <i class="bi bi-person-check"></i>
          <span>Applicant Attendance</span>
        </a>
      </li><!-- End Confirm Registered Drivers Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Attendance for John Doe</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="confirm-drivers.html">Confirm Registered Drivers</a></li>
          <li class="breadcrumb-item active">Edit Attendance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header card-header-custom">
              <h5 class="card-title mb-0">Attendance Record</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Week</th>
                      <th>Monday</th>
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Week 1 -->
                    <tr>
                      <td>Week 1</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                    <!-- Week 2 -->
                    <tr>
                      <td>Week 2</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                    <!-- Week 3 -->
                    <tr>
                      <td>Week 3</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                    <!-- Week 4 -->
                    <tr>
                      <td>Week 4</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                    <!-- Week 5 -->
                    <tr>
                      <td>Week 5</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                    <!-- Week 6 -->
                    <tr>
                      <td>Week 6</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                    <!-- Week 7 -->
                    <tr>
                      <td>Week 7</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                    <!-- Week 8 -->
                    <tr>
                      <td>Week 8</td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><i class="bi bi-circle attendance-icon not-attended"></i></td>
                      <td><button type="button" class="btn btn-primary mt-3">Submit Attendance</button></td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    // Toggle attendance icon between attended and not attended
    document.querySelectorAll('.attendance-icon').forEach(function(icon) {
      icon.addEventListener('click', function() {
        if (this.classList.contains('not-attended')) {
          this.classList.remove('not-attended');
          this.classList.add('attended');
          this.classList.remove('bi-circle');
          this.classList.add('bi-check-circle');
        } else {
          this.classList.remove('attended');
          this.classList.add('not-attended');
          this.classList.remove('bi-check-circle');
          this.classList.add('bi-circle');
        }
      });
    });

    // Submit attendance function
    function submitAttendance() {
      alert('Attendance successfully recorded!');
      // Add logic to handle form submission to server here
    }

    // Attach submit function to the button
    document.querySelector('.btn-primary').addEventListener('click', submitAttendance);
  </script>
</body>

</html>
