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
    .message-display {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #4caf50; /* Green */
    color: white;
    font-size: 16px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 9999;
    display: none;
  }

  /* Animation */
  .message-display.show {
    animation: fadeInOut 2s ease;
  }

  @keyframes fadeInOut {
    0% {
      opacity: 0;
    }
    25% {
      opacity: 1;
    }
    75% {
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  }

  </style>
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
    </div>
    <!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{$studentName}}</span>
          </a>
          <!-- End Profile Image Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{$studentName}}</h6>
              <span>{{$course}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('student-logout')}}">
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
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <div id="message-display" class="message-display"></div>

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
            <!-- Applications Card -->
            <div class="col">
              <div class="card info-card sales-card">
                  <div class="card-body">
                      <h5 class="card-title">Applications</h5>
                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-file-earmark-text"></i>
                          </div>
                          <div class="ps-3">
                              <h6>{{ $totalApplications }}</h6>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- End Applications Card -->

            <!-- Accepted Applications Card -->
            <div class="col">
              <div class="card info-card revenue-card">
                  <div class="card-body">
                      <h5 class="card-title">Accepted</h5>
                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-star-fill"></i>
                          </div>
                          <div class="ps-3">
                              <h6>{{ $acceptedApplications }}</h6>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- End Accepted Applications Card -->

            <!-- Rejected Applications Card -->
            <div class="col">
              <div class="card info-card customers-card">
                  <div class="card-body">
                      <h5 class="card-title">Rejected</h5>
                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-x-circle"></i>
                          </div>
                          <div class="ps-3">
                              <h6>{{ $rejectedApplications }}</h6>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- End Rejected Applications Card -->

            <!-- Pending Applications Card -->
            <div class="col">
              <div class="card info-card pending-card">
                  <div class="card-body">
                      <h5 class="card-title">Pending</h5>
                      <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-hourglass-split"></i>
                          </div>
                          <div class="ps-3">
                              <h6>{{ $pendingApplications }}</h6>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- End Pending Applications Card -->

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
                          <th scope="col">Application Deadline</th>
                          <th scope="col">Status</th>
                          <th scope="col">Confirmed</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($fieldworks as $fieldwork)
                        <tr>
                          <th scope="row">{{ $fieldwork->id }}</th>
                          <td>{{ $fieldwork->companyName }}</td>
                          <td>{{ $fieldwork->fieldworkTitle }}</td>
                          <td>{{ $fieldwork->applicationDeadline }}</td>
                          <td>
                            <span class="badge {{ $fieldwork->status == 'accepted' ? 'bg-success' : ($fieldwork->status == 'rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                              {{ ucfirst($fieldwork->status) }}
                            </span>
                          </td>
                          <td>
                            <span class="badge {{ $fieldwork->confirmed == 'yes' ? 'bg-success' : ($fieldwork->confirmed == 'no' ? 'bg-danger' : 'bg-warning text-dark') }}">
                              {{ ucfirst($fieldwork->confirmed) }}
                            </span>
                          </td>
                          <td>
                            @if ($fieldwork->status == 'accepted')
                              @if ($fieldwork->confirmed == 'no')
                                @if (!$fieldwork->studentHasConfirmed())
                                  <form method="POST" action="{{ route('confirm.application') }}">
                                    @csrf
                                    <input type="hidden" name="fieldworkID" value="{{ $fieldwork->fieldworkID }}">
                                    <input type="hidden" name="confirmed" value="yes">
                                    <button type="submit" class="btn btn-success btn-sm">
                                      <i class="bi bi-check-circle-fill"></i> Confirm
                                    </button>
                                  </form>
                                @endif
                              @else
                                <form method="POST" action="{{ route('confirm.application') }}">
                                  @csrf
                                  <input type="hidden" name="fieldworkID" value="{{ $fieldwork->fieldworkID }}">
                                  <input type="hidden" name="confirmed" value="no">
                                  <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle-fill"></i> Cancel
                                  </button>
                                </form>
                              @endif
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Applications Table -->




          </div>
        </div>
        <!-- End Left side columns -->
      </div>
    </section>
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
