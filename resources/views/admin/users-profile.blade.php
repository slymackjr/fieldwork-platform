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
          </a><!-- End Profile Iamge Icon -->

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
        <a class="nav-link  collapsed" href="{{route('dashboard')}}">
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
        <a class="nav-link" href="{{route('profile')}}">
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

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>Company Name</h2>
              <h3>Fieldwork Title</h3>
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

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Fieldwork Description</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
              
                  <h5 class="card-title">Profile Details</h5>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Supervisor Name</div>
                      <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Company Name</div>
                      <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Fieldwork Title</div>
                      <div class="col-lg-9 col-md-8">Assistant Web Designer</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Supervisor's Position</div>
                      <div class="col-lg-9 col-md-8">Head Web Designer</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Office ID</div>
                      <div class="col-lg-9 col-md-8">A108-NY-535022</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Supervisor's Phone</div>
                      <div class="col-lg-9 col-md-8">0786353826</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Supervisor's Email</div>
                      <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Company TIN Number</div>
                      <div class="col-lg-9 col-md-8">346-OT-3049585</div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Supervisor's Signature</div>
                      <div class="col-lg-9 col-md-8">
                          <img src="assets/img/signature-placeholder.png" alt="Supervisor's Signature" class="img-thumbnail" id="signature-preview" style="max-width: 200px;">
                      </div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Muhuri</div>
                      <div class="col-lg-9 col-md-8">
                          <img src="assets/img/muhuri-placeholder.png" alt="Muhuri" class="img-thumbnail" id="muhuri-preview" style="max-width: 200px;">
                      </div>
                  </div>
              
                  <div class="row">
                      <div class="col-lg-3 col-md-4 label">Post Expire Date</div>
                      <div class="col-lg-9 col-md-8">12, JUNE, 2024</div>
                  </div>
              </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="img-thumbnail">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Supervisor's Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="description" class="col-md-4 col-lg-3 col-form-label">Fieldwork Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="description" class="form-control" id="description" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fieldwork" class="col-md-4 col-lg-3 col-form-label">Fieldwork Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fieldwork" type="text" class="form-control" id="fieldwork" value="Assistant Web Designer">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="position" class="col-md-4 col-lg-3 col-form-label">Supervisor's Position</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="position" type="text" class="form-control" id="position" value="head Web Designer">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="officeID" class="col-md-4 col-lg-3 col-form-label">Office ID</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="officeID" type="text" class="form-control" id="officeID" value="A108-NY-535022">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Supervisor's Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="0784739283">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Supervisor's Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="expireDate" class="col-md-4 col-lg-3 col-form-label">Post Expire Date</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="expireDate" type="text" class="form-control" id="expireDate" value="12, JUNE, 2024">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="signature" class="col-md-4 col-lg-3 col-form-label">Supervisor's Signature</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="signature" type="file" class="form-control" id="signature" accept="image/*">
                        <small class="form-text text-muted">Please upload an image file. Recommended size: 300x100 pixels.</small>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="muhuri" class="col-md-4 col-lg-3 col-form-label">Muhuri</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="muhuri" type="file" class="form-control" id="muhuri" accept="image/*">
                        <small class="form-text text-muted">Please upload an image file. Recommended size: 150x150 pixels.</small>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="tin" class="col-md-4 col-lg-3 col-form-label">TIN Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="tin" type="text" class="form-control" id="tin" value="346-OT-3049585">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
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
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>