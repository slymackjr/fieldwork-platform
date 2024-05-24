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
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="logo">
        <span class="d-none d-lg-block">FIELDWORK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a>
          <!-- End Profile Image Icon -->
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
          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{route('student-dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('log-book')}}">
          <i class="bi bi-book"></i>
          <span>Log Book</span>
        </a>
      </li>
      <!-- End Log Book Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('student-profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
      <!-- End Profile Page Nav -->
    </ul>
  </aside>
  <!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Applications Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Applications</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Applications Card -->

            <!-- Accepted Applications Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Accepted Applications</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>3,264</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Accepted Applications Card -->

            <!-- Attended Applications Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Attended Applications</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1,244</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Attended Applications Card -->

            <!-- Applications Table -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Applications</h5>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Fieldwork Title</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Google</td>
                          <td>Software Engineering Internship</td>
                          <td>
                            <button class="btn btn-success btn-sm"><i class="bi bi-check"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Microsoft</td>
                          <td>Data Science Internship</td>
                          <td>
                            <button class="btn btn-success btn-sm"><i class="bi bi-check"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Amazon</td>
                          <td>Web Development Internship</td>
                          <td>
                            <button class="btn btn-success btn-sm"><i class="bi bi-check"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Facebook</td>
                          <td>Machine Learning Internship</td>
                          <td>
                            <button class="btn btn-success btn-sm"><i class="bi bi-check"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Apple</td>
                          <td>iOS Development Internship</td>
                          <td>
                            <button class="btn btn-success btn-sm"><i class="bi bi-check"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Applications Table -->

            <!-- Accepted Applications Table -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Accepted Applications</h5>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Fieldwork Title</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>IBM</td>
                          <td>Cloud Computing Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Intel</td>
                          <td>AI Research Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Netflix</td>
                          <td>Data Analytics Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Spotify</td>
                          <td>Music Data Science Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Adobe</td>
                          <td>UX Design Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Accepted Applications Table -->

            <!-- Attended Applications Table -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Attended Applications</h5>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Fieldwork Title</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Tesla</td>
                          <td>Autonomous Driving Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>SpaceX</td>
                          <td>Rocket Engineering Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>NVIDIA</td>
                          <td>GPU Development Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Oracle</td>
                          <td>Database Management Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Twitter</td>
                          <td>Social Media Analytics Internship</td>
                          <td>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Attended Applications Table -->

          </div>
        </div>
        <!-- End Left side columns -->
      </div>
    </section>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
