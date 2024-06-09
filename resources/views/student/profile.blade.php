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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
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
            <span class="d-none d-md-block dropdown-toggle ps-2">S. Johnson</span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Samuel Johnson</h6>
              <span>Computer Science</span>
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
        <a class="nav-link collapsed" href="{{ route('student-dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('log-book') }}">
          <i class="bi bi-credit-card"></i>
          <span>Log Book</span>
        </a>
      </li><!-- End Payment Nav -->

      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Alert Message -->
    <div id="alertMessage" class="alert" role="alert" style="display:none;"></div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
              <h2>{{ $student->studentName }}</h2>
              <h3>{{ $student->course }}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <!-- Profile Overview -->
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Student Name</div>
                      <div class="col-lg-9 col-md-8">{{ $student->studentName }}</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Registration ID</div>
                      <div class="col-lg-9 col-md-8">{{ $student->registrationID }}</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{ $student->studentEmail }}</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8">{{ $student->studentPhone }}</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Course</div>
                      <div class="col-lg-9 col-md-8">{{ $student->course }}</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Year of Study</div>
                      <div class="col-lg-9 col-md-8">{{ $student->studyYear }}</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Current GPA</div>
                      <div class="col-lg-9 col-md-8">{{ $student->currentGPA }}</div>
                  </div>
              
                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Introduction Letter</div>
                    <div class="col-lg-9 col-md-8">
                        <!-- Conditionally display button for downloading Introduction Letter -->
                        @if ($student->introductionLetter)
                            <a href="{{ route('pdf.download', ['path' => $student->introductionLetter]) }}" class="btn btn-primary btn-sm">Download Introduction Letter</a>
                        @endif
                    </div>
                </div>
        
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Result Slip</div>
                    <div class="col-lg-9 col-md-8">
                        <!-- Conditionally display button for downloading Result Slip -->
                        @if ($student->resultSlip)
                            <a href="{{ route('pdf.download', ['path' => $student->resultSlip]) }}" class="btn btn-primary btn-sm">Download Result Slip</a>
                        @endif
                    </div>
                </div>
                     
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Course Name</div>
                      <div class="col-lg-9 col-md-8">{{ $student->course }}</div>
                  </div>
              
                </div><!-- End Profile Overview -->
                

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{ route('student-profile-update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="studentName" class="col-md-4 col-lg-3 col-form-label">Student Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="studentName" type="text" class="form-control" id="studentName" value="{{ $student->studentName }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="registrationID" class="col-md-4 col-lg-3 col-form-label">Registration ID</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="registrationID" type="text" class="form-control" id="registrationID" value="{{ $student->registrationID }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="studentEmail" type="email" class="form-control" id="email" value="{{ $student->studentEmail }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="studentPhone" type="text" class="form-control" id="phone" value="{{ $student->studentPhone }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="course" class="col-md-4 col-lg-3 col-form-label">Course</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="course" type="text" class="form-control" id="course" value="{{ $student->course }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="yearOfStudy" class="col-md-4 col-lg-3 col-form-label">Year of Study</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="studyYear" type="text" class="form-control" id="yearOfStudy" value="{{ $student->studyYear }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gpa" class="col-md-4 col-lg-3 col-form-label">Current GPA</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="currentGPA" type="text" class="form-control" id="gpa" value="{{ $student->currentGPA }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="introductionLetter" class="col-md-4 col-lg-3 col-form-label">Introduction Letter</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="introductionLetter" type="file" class="form-control" id="introductionLetter" required>
                            @if ($student->introductionLetter)
                                <a href="{{ asset('storage/' . $student->introductionLetter) }}" target="_blank">View Introduction Letter</a>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="resultSlip" class="col-md-4 col-lg-3 col-form-label">Result Slip</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="resultSlip" type="file" class="form-control" id="resultSlip" required>
                            @if ($student->resultSlip)
                                <a href="{{ asset('storage/' . $student->resultSlip) }}" target="_blank">View Result Slip</a>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="courseName" class="col-md-4 col-lg-3 col-form-label">Course Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="courseName" type="text" class="form-control" id="courseName" value="{{ $student->course }}">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
              </div>
              

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="POST" action="{{ route('student-change-password') }}">
                    @csrf
            
                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="newPassword" type="password" class="form-control" id="newPassword">
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="renewPassword" type="password" class="form-control" id="renewPassword">
                        </div>
                    </div>
            
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form><!-- End Change Password Form -->
            </div>
            

              </div><!-- End Bordered Tabs -->

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
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    // Function to display alert message
    function showAlert(message, type) {
      var alertDiv = document.getElementById('alertMessage');
      alertDiv.classList.remove('alert-success', 'alert-danger');
      if (type === 'success') {
        alertDiv.classList.add('alert-success');
      } else {
        alertDiv.classList.add('alert-danger');
      }
      alertDiv.innerHTML = message;
      alertDiv.style.display = 'block';
      setTimeout(function() {
        alertDiv.style.display = 'none';
      }, 2000); // Hide after 2 seconds
    }

    // Example usage:
    // showAlert('Password changed successfully!', 'success');
    // showAlert('Error: Please enter a valid password.', 'error');
  </script>

</body>

</html>
