<!DOCTYPE html>
<html>
<head>
    <title>Fieldwork Platform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('node_modules/jquery/dist/jquery.slim.min.js') }}"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- IMAGE CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
            <!-- IMAGE CONTAINER END -->

            <!-- FORM CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 infinity-form-container">					
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 infinity-form mx-auto">
                    <!-- Company Logo -->
                    <div class="text-center mb-3 mt-5">
                        <a href="{{route('home')}}">
                            <img src="{{asset('img/logo-3.png')}}" class="img-fluid" style="max-width: 100%;">
                        </a>
                    </div>
                    <div class="text-center mb-4">
                        <h4 class="text-warning">Welcome, Join our community</h4>
                        <h4>Create an account</h4>
                    </div>
                    <!-- Form -->
                    <form class="px-3" method="POST" action="{{ route('student-register-post') }}">
                        @csrf
                        <div class="row">
                            <!-- Input Box -->
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-user-o"></i></span>
                                    <input type="text" name="studentName" placeholder="Full Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-envelope-o"></i></span>
                                    <input type="email" name="studentEmail" placeholder="Email Address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-id-card"></i></span>
                                    <input type="text" name="registrationID" placeholder="Registration ID" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-phone"></i></span>
                                    <input type="tel" name="studentPhone" placeholder="Phone Number" class="form-control" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-book"></i></span>
                                    <input type="text" name="course" placeholder="Course" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-calendar"></i></span>
                                    <input type="number" name="studyYear" placeholder="Year of Study" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-graduation-cap"></i></span>
                                    <input type="number" step="0.01" name="currentGPA" placeholder="Current GPA" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-university"></i></span>
                                    <input type="text" name="university" placeholder="University" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" placeholder="Password" class="form-control" minlength="8" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-input">
                                    <span><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" minlength="8" required>
                                </div>
                            </div>
                        </div>
                        <!-- Register Button -->
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <div class="text-center mb-4 text-white">Already have an account?
                            <a class="login-link" href="{{ route('student-login') }}">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FORM CONTAINER END -->
        </div>
    </div>	
</body>
</html>
