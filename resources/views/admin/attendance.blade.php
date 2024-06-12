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
      <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
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
          </a><!-- End Profile Image Icon -->

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
        <a class="nav-link collapsed" href="{{route('dashboard')}}">
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
      <h1>Edit Attendance for {{$studentName}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('applicant-attendance')}}">Applicant Attendance</a></li>
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
                        <form action="{{ route('attendance.save') }}" method="POST">
                            @csrf
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
                                    @for($week = 1; $week <= 8; $week++)
                                        <tr>
                                            <td>Week {{ $week }}</td>
                                            @for($day = 1; $day <= 5; $day++)
                                                @php
                                                    $dayIndex = ($week - 1) * 5 + $day;
                                                    $attendanceDay = 'day_' . $dayIndex;
                                                    $isPresent = isset($attendance) && $attendance->$attendanceDay == 'present';
                                                @endphp
                                                <td>
                                                    <input type="hidden" name="studentID" value="{{ $studentID }}">
                                                    <input type="hidden" name="{{ $attendanceDay }}" value="{{ $isPresent ? 'present' : 'absent' }}">
                                                    <i class="bi {{ $isPresent ? 'bi-check-circle text-success' : 'bi-circle text-danger' }} attendance-icon" data-day="{{ $attendanceDay }}"></i>
                                                </td>
                                            @endfor
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-success mt-3">
                                <i class="bi bi-save"></i> Save Changes
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

<script>
    document.querySelectorAll('.attendance-icon').forEach(function(icon) {
        icon.addEventListener('click', function() {
            const dayField = document.querySelector(`input[name="${this.dataset.day}"]`);
            if (this.classList.contains('bi-check-circle')) {
                this.classList.remove('bi-check-circle', 'text-success');
                this.classList.add('bi-circle', 'text-danger');
                dayField.value = 'absent';
            } else {
                this.classList.remove('bi-circle', 'text-danger');
                this.classList.add('bi-check-circle', 'text-success');
                dayField.value = 'present';
            }
        });
    });
</script>

<style>
    .attendance-icon {
        cursor: pointer;
        font-size: 1.5rem;
    }
    .btn-success {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
</style>


  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>


  
</body>

</html>
