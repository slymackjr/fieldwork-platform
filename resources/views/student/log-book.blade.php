{{--    <!DOCTYPE html>
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
               <a href="{{route('home')}}" class="logo d-flex align-items-center">
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
                           <span class="d-none d-md-block dropdown-toggle ps-2">{{$studentName}}</span>
                       </a>
                       <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                           <li class="dropdown-header">
                               <h6>{{$studentName}}</h6>
                               <span>{{$studentName}}</span>
                           </li>
                           <li><hr class="dropdown-divider"></li>
                           <li>
                               <a class="dropdown-item d-flex align-items-center" href="{{route('student-logout')}}">
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
                       <li class="breadcrumb-item active">Log Book</li>
                   </ol>
               </nav>
           </div>
           <section class="section">
               <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-6">
                      <div class="card">
                          <div class="card-body log-book-container">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h6 class="log-book-title">Select Day</h6>
                                      <!-- Select Day Form -->
                                      <form method="GET" action="{{ route('log-book') }}">
                                          <select class="form-select" id="selectedDay" name="selectedDay">
                                              <option disabled selected>Select a day...</option>
                                              <!-- Generate options for 40 days -->
                                              @for ($i = 1; $i <= 40; $i++)
                                                  <option value="{{ $i }}" {{ $i == $selectedDay ? 'selected' : '' }}>Day {{ $i }}</option>
                                              @endfor
                                          </select>                                          
                                          <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary mt-3">
                                              <i class="bi bi-calendar-check-fill"></i> Select Day
                                          </button>
                                          </div>
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
                                      <input type="hidden" name="logID" value="{{ $logBooks->logID }}">
                                      <label for="dayLog" class="form-label">Log for the selected day:</label>
                                      <textarea class="form-control" id="dayLog" name="log" rows="5">{{ $logBooks ? $logBooks->{"day_$selectedDay"} : '' }}</textarea>
                                      <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mt-3">
                                          <i class="bi bi-journal-plus"></i> Save Log
                                      </button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>                                      
              </div>
              
               </div>
           </section>
       </main>

       <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
       <!-- Vendor JS Files -->
      <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
      <!-- Template Main JS File -->
      <script src="{{ asset('assets/js/main.js') }}"></script>
        
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
        <!-- Favicons -->
        <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
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
                position: relative;
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
    
            .download-pdf-btn {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        </style>
    </head>
    <body>
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{route('home')}}" class="logo d-flex align-items-center">
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
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{$studentName}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{$studentName}}</h6>
                                <span>{{$studentName}}</span>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{route('student-logout')}}">
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
                        <li class="breadcrumb-item active">Log Book</li>
                    </ol>
                </nav>
            </div>
            <section class="section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body log-book-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="log-book-title">Select Day</h6>
                                            <!-- Select Day Form -->
                                            <form method="GET" action="{{ route('log-book') }}">
                                                <select class="form-select" id="selectedDay" name="selectedDay">
                                                    <option disabled selected>Select a day...</option>
                                                    <!-- Generate options for 40 days -->
                                                    @for ($i = 1; $i <= 40; $i++)
                                                        <option value="{{ $i }}" {{ $i == $selectedDay ? 'selected' : '' }}>Day {{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary mt-3">
                                                        <i class="bi bi-calendar-check-fill"></i> Select Day
                                                    </button>
                                                </div>
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
                                            <input type="hidden" name="logID" value="{{ $logBooks->logID }}">
                                            <label for="dayLog" class="form-label">Log for the selected day:</label>
                                            <textarea class="form-control" id="dayLog" name="log" rows="5">{{ $logBooks ? $logBooks->{"day_$selectedDay"} : '' }}</textarea>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary mt-3">
                                                    <i class="bi bi-journal-plus"></i> Save Log
                                                </button>
                                            </div>
                                        </form>
                                        <form method="POST" action="{{ route('generateReport') }}" class="download-pdf-btn">
                                            @csrf
                                            <input type="hidden" name="logID" value="{{ $logBooks->logID }}">
                                            <button type="submit" class="btn bg-success text-white">
                                                <i class="bi bi-file-earmark-pdf"></i> Download PDF
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
    </html>
    