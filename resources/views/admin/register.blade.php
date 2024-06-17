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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 infinity-form">
                    <!-- Company Logo -->
                    <div class="text-center mb-3 mt-5">
                        <a href="{{route('home')}}">
                            <img src="{{asset('img/logo-3.png')}}" width="500px">
                        </a>
                    </div>
                    <div class="text-center mb-4">
                        <h4 class="text-warning">Welcome, Create Opportunities</h4>
                        <h4>Create an account</h4>
                    </div>
                    <!-- Form -->
                    <form class="px-3" method="POST" action="{{ route('register-employer') }}">
                        @csrf
                        <div class="row">
                            <!-- Input Box -->
                            <div class="col-md-6">
                                <div class="form-input mb-1">
                                    <span><i class="fa fa-user-o"></i></span>
                                    <input type="text" name="companyName" placeholder="Company Name" required>
                                    @error('companyName')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input mb-1">
                                    <span><i class="fa fa-envelope-o"></i></span>
                                    <input type="email" name="supervisorEmail" placeholder="Supervisor Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title="Please enter a valid email address (e.g., example@domain.com)">
                                    @error('supervisorEmail')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input mb-1">
                                    <span><i class="fa fa-user"></i></span>
                                    <input type="text" name="supervisorName" placeholder="supervisor's Name" required>
                                    @error('supervisorName')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-input mb-1">
                                    <span><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" placeholder="Password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 characters" required >
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Add more input fields as needed -->
                        </div>
                        <!-- Register Button -->
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-block btn-primary">Register</button>
                        </div>
                        <div class="text-center mb-4 text-white">Already have an account?
                            <a class="login-link" href="{{ route('login') }}">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FORM CONTAINER END -->
        </div>
    </div>	
</body>
</html>
