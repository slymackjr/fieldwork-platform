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
        <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row ">
                <!-- IMAGE CONTAINER BEGIN -->
                <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
                <!-- IMAGE CONTAINER END -->

                <!-- FORM CONTAINER BEGIN -->
                <div class="col-lg-6 col-md-6 infinity-form-container">					
                    <div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 infinity-form">
                        <!-- Company Logo -->
                        <div class="text-center mb-3 mt-5">
                            <a href="{{route('home')}}">
                                <img src="{{asset('img/logo-3.png')}}" width="500px">
                            </a>
                        </div>
                        <div class="text-center mb-4">
                            <h4 class="text-warning">Begin your search here!</h4>
                            <h4>Create an account</h4>
                        </div>
                        <!-- Form -->
                        <form class="px-3">
                            @csrf
                            <!-- Input Box -->
                            <div class="form-input">
                                <span><i class="fa fa-user-o"></i></span>
                                <input type="text" name="name" placeholder="Full Name" tabindex="10" required>
                            </div>
                            <div class="form-input">
                                <span><i class="fa fa-envelope-o"></i></span>
                                <input type="email" name="email" placeholder="Email Address" tabindex="10"required>
                            </div>
                            <div class="form-input">
                                <span><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                            <!-- Register Button -->
                            <div class="mb-3"> 
                                <button type="submit" class="btn btn-block">Register</button>
                            </div>
                            <div class="text-center mb-5 text-white">Already have an account?
                                <a class="login-link" href="{{route('login')}}">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- FORM CONTAINER END -->
            </div>
        </div>	
    </body>
</html>