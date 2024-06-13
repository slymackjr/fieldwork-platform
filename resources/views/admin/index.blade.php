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

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="logo">
        <span class="d-none d-lg-block">FIELDWORK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
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
        <a class="nav-link active" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('fieldwork-post.edit') }}">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <!-- Show message if employer profile is incomplete -->
          @if($incompleteProfile)
          <div class="alert alert-warning text-center" role="alert">
            {{$incompleteProfile}}
          </div>
          @endif

          <!-- Display the success message -->
                @if(session('success'))
                <div class="alert alert-success text-center" id="success-alert">
                  {{ session('success') }}
                </div>
              @endif

              <!-- Display the error message -->
              @if(session('error'))
                <div class="alert alert-danger text-center" id="error-alert">
                  {{ session('error') }}
                </div>
              @endif

              <!-- Custom JS to hide success and error messages after 2 seconds -->
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const successAlert = document.getElementById('success-alert');
                  const errorAlert = document.getElementById('error-alert');

                  if (successAlert) {
                    setTimeout(() => {
                      successAlert.style.display = 'none';
                    }, 2000);
                  }

                  if (errorAlert) {
                    setTimeout(() => {
                      errorAlert.style.display = 'none';
                    }, 2000);
                  }
                });
              </script>
          <div class="row">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-4">
              <!-- Overall Applicants Card -->
              <div class="col">
                  <div class="card info-card sales-card">
                      <div class="card-body">
                          <h5 class="card-title">Overall Applicants</h5>
                          <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="bi bi-people"></i>
                              </div>
                              <div class="ps-3">
                                  <h6>{{ $rejectedCount + $pendingCount + $acceptedCount }}</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!-- End Overall Applicants Card -->
          
              <!-- Accepted Applicants Card -->
              <div class="col">
                  <div class="card info-card revenue-card">
                      <div class="card-body">
                          <h5 class="card-title">Accepted Applicants</h5>
                          <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="bi bi-check-circle"></i>
                              </div>
                              <div class="ps-3">
                                  <h6>{{ $acceptedCount }}</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!-- End Accepted Applicants Card -->
          
              <!-- Pending Applicants Card -->
              <div class="col">
                  <div class="card info-card customers-card">
                      <div class="card-body">
                          <h5 class="card-title">Pending Applicants</h5>
                          <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="bi bi-clock"></i>
                              </div>
                              <div class="ps-3">
                                  <h6>{{ $pendingCount }}</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!-- End Pending Applicants Card -->
          
              <!-- Rejected Applicants Card -->
              <div class="col">
                  <div class="card info-card customers-card">
                      <div class="card-body">
                          <h5 class="card-title">Rejected Applicants</h5>
                          <div class="d-flex align-items-center">
                              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <i class="bi bi-x-circle"></i>
                              </div>
                              <div class="ps-3">
                                  <h6>{{ $rejectedCount }}</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div><!-- End Rejected Applicants Card -->
          </div>
          
            <!-- Overall Applicants Table -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Overall Applicants</h5>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">StudentName</th>
                          <th scope="col">University</th>
                          <th scope="col">Course</th>
                          <th scope="col">StudyYear</th>
                          <th scope="col">GPA</th>
                          <th scope="col">IntroductionLetter</th>
                          <th scope="col">ResultSlip</th>
                          <th scope="col">Status</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($fieldworks as $fieldwork)
                          <tr>
                            <td>{{ $fieldwork->student->studentName }}</td>
                            <td>{{ $fieldwork->student->university }}</td>
                            <td>{{ $fieldwork->student->course }}</td>
                            <td>{{ $fieldwork->student->studyYear }}</td>
                            <td>{{ $fieldwork->student->currentGPA }}</td>
                            <td>@if ($fieldwork->student->introductionLetter)
                              <a href="{{ asset('storage/' . $fieldwork->student->introductionLetter) }}" target="_blank">View Introduction Letter</a>
                                @endif
                            </td>
                            <td> @if ($fieldwork->student->resultSlip)
                              <a href="{{ asset('storage/' . $fieldwork->student->resultSlip) }}" target="_blank">View Result Slip</a>
                                @endif
                            </td>
                            <td>
                              @if($fieldwork->status == 'accepted')
                                <span class="badge bg-success">Accepted</span>
                              @elseif($fieldwork->status == 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                              @else
                                <span class="badge bg-warning">Pending</span>
                              @endif
                            </td>
                            <td>
                              <div style="display: flex; gap: 10px;">
                                <form action="{{ route('admin.updateStatus') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="fieldworkID" value="{{$fieldwork->fieldworkID}}">
                                  <input type="hidden" name="status" value="rejected">
                                  <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center">
                                    <i class="bi bi-x-circle me-1"></i> Decline
                                  </button>
                                </form>
                                <form action="{{ route('admin.updateStatus', $fieldwork->fieldworkID) }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="fieldworkID" value="{{$fieldwork->fieldworkID}}">
                                  <input type="hidden" name="status" value="accepted">
                                  <button type="submit" class="btn btn-outline-primary btn-sm d-flex align-items-center">
                                    <i class="bi bi-check-circle me-1"></i> Accept
                                  </button>
                                </form>
                              </div>
                            </td>                           
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Overall Applicants Table -->

          </div>
        </div><!-- End Left side columns -->
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
