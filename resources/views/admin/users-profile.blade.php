<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FIELDWORK PLATFORM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <style>
    /* Add this to your CSS file */
.large-text-h2 {
    font-size: 2.5rem;
    color: #0d6efd;
    margin: 0;
}

.large-text-h3 {
    font-size: 2rem;
    color: #6c757d;
    margin: 0;
}

.centered-profile-card {
    height: 200px;
    justify-content: center;
    padding: 20px;
}

  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">FIELDWORK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{{asset('assets/img/profile-img.jpg')}}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{$employerName}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{$employerName}}</h6>
              <span>{{$employerCompany}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
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
      
      @if (!$incompleteProfile)
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('fieldwork-post.edit') }}">
          <i class="bi bi-credit-card"></i>
          <span>Fieldwork Post</span>
        </a>
      </li><!-- End Payment Nav -->
      @endif
      
      @if ($deadline)
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('applicant-attendance')}}">
          <i class="bi bi-person-check"></i>
          <span>Applicant Attendance</span>
        </a>
      </li><!-- End Confirm Registered Drivers Nav -->
      @endif

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
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <!-- Show message if employer profile is incomplete -->
          @if($incompleteProfile)
          <div class="alert alert-warning text-center" role="alert">
            Please complete your profile and field details to post fieldwork.
          </div>
          @endif
          <div class="card text-center">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center centered-profile-card" style="background-color: #f8f9fa;">
                  <i class="bi bi-building" style="font-size: 4rem; color: #0d6efd;"></i>
                  <h2 class="large-text-h2 mt-3">{{ $employer->companyName }}</h2>
                  <h3 class="large-text-h3">{{ $employer->fieldworkTitle }}</h3>
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
        
                            <h5 class="card-title">Profile Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Supervisor Name</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->supervisorName }}</div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Company Name</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->companyName }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Location</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->location }}</div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Supervisor's Position</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->supervisorPosition }}</div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Office ID</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->officeID }}</div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Supervisor's Phone</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->supervisorPhone }}</div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Supervisor's Email</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->supervisorEmail }}</div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Company TIN Number</div>
                                <div class="col-lg-9 col-md-8">{{ $employer->TIN }}</div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Supervisor's Signature</div>
                                <div class="col-lg-9 col-md-8">
                                    @if($employer->supervisorSignature)
                                        <img src="{{ asset('storage/' . $employer->supervisorSignature) }}" alt="Supervisor's Signature" class="img-thumbnail" style="max-width: 200px;">
                                    @else
                                        <p>No signature uploaded.</p>
                                    @endif
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Muhuri</div>
                                <div class="col-lg-9 col-md-8">
                                    @if($employer->Muhuri)
                                        <img src="{{ asset('storage/' . $employer->Muhuri) }}" alt="Muhuri" class="img-thumbnail" style="max-width: 200px;">
                                    @else
                                        <p>No Muhuri uploaded.</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Company Logo</div>
                                <div class="col-lg-9 col-md-8">
                                    @if($employer->companyLogo)
                                        <img src="{{ asset('storage/' . $employer->companyLogo) }}" alt="CompanyLogo" class="img-thumbnail" style="max-width: 200px;">
                                    @else
                                        <p>No Company Logo uploaded.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
        
                        <div class="tab-pane fade pt-3" id="profile-edit">
                            <!-- Profile Edit Form -->
                            <form action="{{ route('employer.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="supervisorName" type="text" class="form-control" id="fullName" value="{{ $employer->supervisorName }}">
                                    </div>
                                </div>        
        
                                <div class="row mb-3">
                                    <label for="companyName" class="col-md-4 col-lg-3 col-form-label">Company Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="companyName" type="text" class="form-control" id="companyName" value="{{ $employer->companyName }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="location" class="col-md-4 col-lg-3 col-form-label">Location</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="location" type="text" class="form-control" id="location" value="{{ $employer->location }}">
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="supervisorPosition" class="col-md-4 col-lg-3 col-form-label">Supervisor's Position</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="supervisorPosition" type="text" class="form-control" id="supervisorPosition" value="{{ $employer->supervisorPosition }}">
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="officeID" class="col-md-4 col-lg-3 col-form-label">Office ID</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="officeID" type="text" class="form-control" id="officeID" value="{{ $employer->officeID }}">
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="supervisorPhone" class="col-md-4 col-lg-3 col-form-label">Supervisor's Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="supervisorPhone" type="text" class="form-control" id="supervisorPhone" value="{{ $employer->supervisorPhone }}">
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="supervisorEmail" class="col-md-4 col-lg-3 col-form-label">Supervisor's Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="supervisorEmail" type="email" class="form-control" id="supervisorEmail" value="{{ $employer->supervisorEmail }}">
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="TIN" class="col-md-4 col-lg-3 col-form-label">Company TIN Number</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="TIN" type="text" class="form-control" id="TIN" value="{{ $employer->TIN }}">
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="supervisorSignature" class="col-md-4 col-lg-3 col-form-label">Supervisor's Signature (width 300px)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="supervisorSignature" type="file" class="form-control" id="supervisorSignature" accept="image/*">
                                        @if($employer->supervisorSignature)
                                            <img src="{{ asset('storage/' . $employer->supervisorSignature) }}" alt="Supervisor's Signature" class="img-thumbnail mt-3" style="max-width: 200px;">
                                        @endif
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="Muhuri" class="col-md-4 col-lg-3 col-form-label">Muhuri (width 300px)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="Muhuri" type="file" class="form-control" id="Muhuri" accept="image/*">
                                        @if($employer->Muhuri)
                                            <img src="{{ asset('storage/' . $employer->Muhuri) }}" alt="Muhuri" class="img-thumbnail mt-3" style="max-width: 200px;">
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="CompanyLogo" class="col-md-4 col-lg-3 col-form-label">Company Logo (width 300px)</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="CompanyLogo" type="file" class="form-control" id="CompanyLogo" accept="image/*">
                                        @if($employer->companyLogo)
                                        <img src="{{ asset('storage/' . $employer->companyLogo) }}" alt="CompanyLogo" class="img-thumbnail mt-3" style="max-width: 200px;">
                                        @endif
                                    </div>
                                </div>
        
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form><!-- End Profile Edit Form -->
                        </div>
        
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="{{ route('employer.password.update') }}" method="POST">
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
        
        <script>
            document.getElementById('supervisorSignature').addEventListener('change', function (event) {
                validateImage(event.target);
            });
        
            document.getElementById('Muhuri').addEventListener('change', function (event) {
                validateImage(event.target);
            });
        
            function validateImage(input) {
                const file = input.files[0];
                const img = new Image();
                img.src = URL.createObjectURL(file);
                img.onload = function () {
                    if (this.width !== 300) {
                        alert('The Image must have width 300px.');
                        input.value = '';
                    }
                }
            }
        </script>

      </div>
  </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>