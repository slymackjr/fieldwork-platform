<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fieldwork Platform</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <!-- header-start -->
    <style>
        .profile-icon {
            position: relative;
        }
    
        .profile-icon img {
            border-radius: 50%;
            transition: transform 0.3s ease;
            cursor: pointer; /* Added cursor pointer here */
        }
    
        .profile-dropdown {
            display: none;
            position: absolute;
            top: 50px; /* Adjust as needed */
            right: 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
            z-index: 1000;
            border-radius: 5px;
            min-width: 150px;
        }
    
        .profile-dropdown a {
            display: block;
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }
    
        .profile-dropdown a:hover {
            background-color: #f5f5f5;
        }
    
        .profile-dropdown p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
    </style>
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('img/logo-3.png') }}" alt="" width="300px">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <!-- Apply Fieldwork Link -->
                                        @if (!session('user_type'))
                                            <a href="{{ route('student-login') }}" id="apply-fieldwork">Apply Fieldwork</a>
                                        @endif
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <!-- Post Fieldwork Link -->
                                        @if (!session('user_type'))
                                            <a class="boxed-btn3" href="{{ route('login') }}" id="post-fieldwork">Post Fieldwork</a>
                                        @endif
                                    </div>
                                    <!-- Profile Icon Dropdown -->
                                    @if (session('user_type'))
                                        <div class="profile-icon" id="profile-icon">
                                            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle" width="40" onclick="toggleDropdown()">
                                            <div class="profile-dropdown" id="profile-dropdown">
                                                @if (session('user_type') == 'student')
                                                    <p class="font-weight-bold">{{ session('student_name') }}</p>
                                                    <p class="font-weight-bold">{{ session('course') }}</p>
                                                    <a class="font-weight-bold" href="{{ route('student-dashboard') }}">Dashboard</a>
                                                    <a class="font-weight-bold" href="{{ route('student-logout') }}">Logout</a>
                                                @elseif (session('user_type') == 'employer')
                                                    <p>{{ session('employer_name') }}</p>
                                                    <p>{{ session('employer_company') }}</p>
                                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                                    <a href="{{ route('logout') }}">Logout</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <!-- End Profile Icon Dropdown -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('profile-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }
    
        document.addEventListener('click', function(event) {
            var isClickInside = document.getElementById('profile-icon').contains(event.target);
            if (!isClickInside) {
                document.getElementById('profile-dropdown').style.display = 'none';
            }
        });
    </script>
    <!-- header-end -->

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

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$employer->fieldworkTitle}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="{{ asset('storage/' . $employer->companyLogo) }}" alt="Company Logo" style="width: 80px;">
                                </div>
                                <div class="jobs_conetent">
                                    <h4>{{$employer->fieldworkTitle}}</h4>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i>{{$employer->location}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> Field Placement </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Fieldwork description</h4>
                            <p>{{$employer->fieldworkDescription}}</p>
                        </div>
                    </div>
                    <div class="apply_job_form white-bg">
                        <h4>Apply for the Fieldwork</h4>
                        @if(session('user_type') == 'student')
                        <form action="{{ route('apply') }}" method="POST">
                            @csrf
                            <input type="hidden" name="employerID" value="{{ $employer->employerID }}">
                            <input type="hidden" name="studentID" value="{{ session('student_id') }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="submit_btn">
                                    <a href="{{route('student-login')}}" class="boxed-btn3 w-100">Apply Now</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Supervisor's Details</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Supervisor's Name: <span>{{$employer->supervisorName}}</span></li>
                                <li>Supervisor's Position: <span>{{$employer->supervisorPosition}}</span></li>
                                <li>Supervisor's Email <span>{{$employer->supervisorEmail}}</span></li>
                                <li>Deadline: <span>{{$employer->applicationDeadline}}</span></li>
                                <li>Company Name: <span>{{$employer->companyName}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS here -->
    <script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/ajax-form.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/scrollIt.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>

    <!--contact js-->
    <script src="{{asset('js/contact.js')}}"></script>
    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/mail-script.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>