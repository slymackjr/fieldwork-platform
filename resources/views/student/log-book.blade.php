{{--   <!DOCTYPE html>
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
  
    <style>
      /* Custom styles for the log book form */
      .log-book-day {
        position: relative;
        padding-bottom: 35px; /* Space for icons */
      }
  
      .log-book-day .icon {
        position: absolute;
        top: 10px;
        right: 45px;
        cursor: pointer;
      }
  
      .log-book-day .save-icon {
        right: 10px;
      }
  
      .log-book-day .icon:hover {
        color: #007bff; /* Change color on hover */
      }
  
      /* Additional styling */
      .log-book-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
  
      .log-book-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
      }
  
      .log-book-day textarea {
        resize: none;
      }
  
      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }
  
      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
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
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>Need Help?</span>
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
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
          <a class="nav-link collapsed" href="{{route('student-dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
          <a class="nav-link active" href="{{route('log-book')}}">
            <i class="bi bi-bell"></i>
            <span>Log Book</span>
          </a>
        </li><!-- End Send Notifications Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{route('student-profile')}}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->
      </ul>
    </aside><!-- End Sidebar-->
    <main id="main" class="main">
      <div class="pagetitle">
          <h1>Log Book</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Log Book</li>
                  <li class="breadcrumb-item active">Week 1</li>
              </ol>
          </nav>
      </div>
      <section class="section">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="card">
                          <div class="card-body log-book-container">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h6 class="log-book-title">Select Day</h6>
                                      <select class="form-select" id="selectedDay">
                                          <option selected disabled>Select a day...</option>
                                          <!-- Generate options for 40 days -->
                                          @for ($i = 1; $i <= 40; $i++)
                                              <option value="{{ $i }}">Day {{ $i }}</option>
                                          @endfor
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="card">
                          <div class="card-body log-book-container">
                              <h6 class="log-book-title">Day's Log</h6>
                              <div class="mb-3 log-book-day">
                                  <p id="selectedDayDisplay"></p>
                                  <label for="dayLog" class="form-label">Log for the selected day:</label>
                                  <textarea class="form-control" id="dayLog" rows="5"></textarea>
                                  <button type="button" class="btn btn-primary mt-3" id="saveLogButton">Save Log</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </main>><!-- End #main -->
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
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/bootstrap-icons/bootstrap-icons.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('selectedDay').addEventListener('change', function() {
          const selectedDay = this.value;
          document.getElementById('selectedDayDisplay').textContent = `Selected Day: Day ${selectedDay}`;

          fetch(`/log-book/day/${selectedDay}`)
            .then(response => response.json())
            .then(data => {
              document.getElementById('dayLog').value = data.log;
            })
            .catch(error => console.error('Error fetching day log:', error));
        });

        document.getElementById('saveLogButton').addEventListener('click', function() {
          const selectedDay = document.getElementById('selectedDay').value;
          const log = document.getElementById('dayLog').value;

          fetch(`/log-book/day/${selectedDay}`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ log: log })
          })
            .then(response => response.json())
            .then(data => {
              if (data.status === 'success') {
                alert('Log saved successfully.');
              } else {
                alert('Error saving log.');
              }
            })
            .catch(error => console.error('Error saving day log:', error));
        });
      });
    </script>
  </body>
  
  </html>
   --}}

   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="utf-8">
       <meta content="width=device-width, initial-scale=1.0" name="viewport">
       <title>FIELDWORK PLATFORM</title>
       <meta content="" name="description">
       <meta content="" name="keywords">
       <link href="assets/img/favicon.png" rel="icon">
       <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
       <link href="https://fonts.gstatic.com" rel="preconnect">
       <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
       <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
       <link href="assets/css/style.css" rel="stylesheet">
       <style>
         .log-book-day {
           position: relative;
           padding-bottom: 35px;
         }
   
         .log-book-day .icon {
           position: absolute;
           top: 10px;
           right: 45px;
           cursor: pointer;
         }
   
         .log-book-day .save-icon {
           right: 10px;
         }
   
         .log-book-day .icon:hover {
           color: #007bff;
         }
   
         .log-book-container {
           padding: 20px;
           background-color: #f8f9fa;
           border-radius: 10px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }
   
         .log-book-title {
           font-size: 24px;
           font-weight: 600;
           margin-bottom: 20px;
         }
   
         .log-book-day textarea {
           resize: none;
         }
   
         .btn-primary {
           background-color: #007bff;
           border-color: #007bff;
         }
   
         .btn-primary:hover {
           background-color: #0056b3;
           border-color: #0056b3;
         }
       </style>
   </head>
   <body>
       <header id="header" class="header fixed-top d-flex align-items-center">
           <div class="d-flex align-items-center justify-content-between">
               <a href="index.html" class="logo d-flex align-items-center">
                   <img src="assets/img/logo.png" alt="">
                   <span class="d-none d-lg-block">FIELDWORK</span>
               </a>
               <i class="bi bi-list toggle-sidebar-btn"></i>
           </div>
           <nav class="header-nav ms-auto">
               <ul class="d-flex align-items-center">
                   <li class="nav-item dropdown pe-3">
                       <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                           <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                           <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                       </a>
                       <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                           <li class="dropdown-header">
                               <h6>Kevin Anderson</h6>
                               <span>Web Designer</span>
                           </li>
                           <li><hr class="dropdown-divider"></li>
                           <li>
                               <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                   <i class="bi bi-person"></i>
                                   <span>My Profile</span>
                               </a>
                           </li>
                           <li><hr class="dropdown-divider"></li>
                           <li>
                               <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                   <i class="bi bi-gear"></i>
                                   <span>Account Settings</span>
                               </a>
                           </li>
                           <li><hr class="dropdown-divider"></li>
                           <li>
                               <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                   <i class="bi bi-question-circle"></i>
                                   <span>Need Help?</span>
                               </a>
                           </li>
                           <li><hr class="dropdown-divider"></li>
                           <li>
                               <a class="dropdown-item d-flex align-items-center" href="#">
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
                   <a class="nav-link collapsed" href="{{ route('student-dashboard') }}">
                       <i class="bi bi-grid"></i>
                       <span>Dashboard</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link active" href="{{ route('log-book') }}">
                       <i class="bi bi-bell"></i>
                       <span>Log Book</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link collapsed" href="{{ route('student-profile') }}">
                       <i class="bi bi-person"></i>
                       <span>Profile</span>
                   </a>
               </li>
           </ul>
       </aside>
       <main id="main" class="main">
           <div class="pagetitle">
               <h1>Log Book</h1>
               <nav>
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                       <li class="breadcrumb-item">Log Book</li>
                       <li class="breadcrumb-item active">Week 1</li>
                   </ol>
               </nav>
           </div>
           <section class="section">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-6">
                           <div class="card">
                               <div class="card-body log-book-container">
                                   <div class="row">
                                       <div class="col-md-12">
                                           <h6 class="log-book-title">Select Day</h6>
                                           <!-- Select Day Form -->
                                          <form method="POST" action="{{ route('log-book.selectDay') }}">
                                            @csrf
                                            <select class="form-select" id="selectedDay" name="selectedDay">
                                              <option disabled>Select a day...</option>
                                              <!-- Generate options for 40 days -->
                                              @for ($i = 1; $i <= 40; $i++)
                                                  <option value="{{ $i }}" {{ $i == $selectedDay ? 'selected' : '' }}>Day {{ $i }}</option>
                                              @endfor
                                          </select>                                          
                                            <button type="submit" class="btn btn-primary mt-3">Select Day</button>
                                          </form>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body log-book-container">
                                <h6 class="log-book-title">Day's Log</h6>
                                <div class="mb-3 log-book-day">
                                    <p id="selectedDayDisplay">Selected Day: Day {{ $selectedDay }}</p>
                                    <form method="POST" action="{{ route('log-book.saveLog', ['selectedDay' => $selectedDay]) }}">
                                        @csrf
                                        <input type="hidden" name="selectedDay" value="{{ $selectedDay }}">
                                        <label for="dayLog" class="form-label">Log for the selected day:</label>
                                        <textarea class="form-control" id="dayLog" name="log" rows="5">{{ $logBooks ? $logBooks->{"day_$selectedDay"} : '' }}</textarea>
                                        <button type="submit" class="btn btn-primary mt-3">Save Log</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                       </div>                                      
                   </div>
               </div>
           </section>
       </main>
       <footer id="footer" class="footer">
           <div class="copyright">
               &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
           </div>
           <div class="credits">
               Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
           </div>
       </footer>
       <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
       <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
       <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
       <script src="assets/vendor/bootstrap-icons/bootstrap-icons.js"></script>
       <script src="assets/js/main.js"></script>
    
   </body>
   </html>
   