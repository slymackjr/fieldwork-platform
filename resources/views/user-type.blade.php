<!DOCTYPE html>
<html>

<head>
    <title>Fieldwork Platform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
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
                        <h4 class="text-warning">Welcome!</h4>
                        <h4>Select your role to proceed</h4>
                    </div>

                    <!-- User Options -->
                    <div class="d-flex flex-column flex-md-row justify-content-center">
                        <!-- Application Option -->
                        <div class="card text-center m-2 flex-fill">
                            <div class="card-body">
                                <i class="fa fa-file-text fa-3x text-warning"></i>
                                <h5 class="card-title mt-3">Applicant</h5>
                                <a href="{{route('student-login')}}" class="btn btn-warning mt-2">Login Student</a>
                            </div>
                        </div>
                        <!-- Employer Option -->
                        <div class="card text-center m-2 flex-fill">
                            <div class="card-body">
                                <i class="fa fa-briefcase fa-3x text-warning"></i>
                                <h5 class="card-title mt-3">Employer</h5>
                                <a href="{{route('login')}}" class="btn btn-warning mt-2">Login Employer</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- FORM CONTAINER END -->
        </div>
    </div>
</body>

</html>
