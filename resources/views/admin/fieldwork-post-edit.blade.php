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

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">FIELDWORK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{$employerName}}</span>
          </a>
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
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('fieldwork-post.edit') }}">
          <i class="bi bi-credit-card"></i>
          <span>Fieldwork Post</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('applicant-attendance')}}">
          <i class="bi bi-person-check"></i>
          <span>Applicant Attendance</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Fieldwork Post</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Fieldwork Post Edit</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <!-- Show message if employer profile is incomplete -->
          @if($incompleteProfile)
          <div class="alert alert-warning text-center" role="alert">
            {{$incompleteProfile}}
          </div>
          @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Fieldwork Post</h5>
          
              <!-- Display the success message -->
              @if(session('success'))
                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        {{ session('success') }}
                      </div>
                    </div>
                  </div>
                </div>
              @endif

              <!-- Display the error message -->
              @if(session('error'))
                <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        {{ session('error') }}
                      </div>
                    </div>
                  </div>
                </div>
              @endif

              <!-- Custom JS to show modals and hide them after 2 seconds -->
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  const successModalElement = document.getElementById('successModal');
                  const errorModalElement = document.getElementById('errorModal');
                  
                  if (successModalElement) {
                    const successModal = new bootstrap.Modal(successModalElement);
                    successModal.show();
                    setTimeout(() => {
                      successModal.hide();
                    }, 2000);
                  }

                  if (errorModalElement) {
                    const errorModal = new bootstrap.Modal(errorModalElement);
                    errorModal.show();
                    setTimeout(() => {
                      errorModal.hide();
                    }, 2000);
                  }
                });
              </script>

              <form action="{{ route('fieldwork-post.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="companyName" class="form-label">Company Name</label>
                  <input type="text" name="companyName" class="form-control" id="companyName" value="{{ $employer->companyName }}" required>
                </div>
                <div class="mb-3">
                  <label for="fieldworkTitle" class="form-label">Fieldwork Title</label>
                  <input type="text" name="fieldworkTitle" class="form-control" id="fieldworkTitle" value="{{ $employer->fieldworkTitle }}" required>
                </div>
                <div class="mb-3">
                  <label for="fieldworkDescription" class="form-label">Fieldwork Description</label>
                  <textarea name="fieldworkDescription" class="form-control" id="fieldworkDescription" rows="5" required>{{ $employer->fieldworkDescription }}</textarea>
                </div>
                <div class="mb-3">
                  <label for="applicationDeadline" class="form-label">Application Deadline</label>
                  <input type="date" name="applicationDeadline" class="form-control" id="applicationDeadline" value="{{ $employer->applicationDeadline ? $employer->applicationDeadline->format('Y-m-d') : '' }}" required>
                </div>
              
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save Changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

  
</body>

</html>
