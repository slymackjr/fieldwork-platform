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
			<div class="row ">
				<!-- IMAGE CONTAINER BEGIN -->
				<div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container"></div>
				<!-- IMAGE CONTAINER END -->

				<!-- FORM CONTAINER BEGIN -->
				<div class="col-lg-6 col-md-6 infinity-form-container">				
					<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
						<!-- Company Logo -->
						<div class="text-center mb-3 mt-5">
							<a href="{{route('home')}}">
                                <img src="{{asset('img/logo-3.png')}}" width="500px">
                            </a>
						</div>
						<div class="text-center mb-4">
							<h4 class="text-warning">Welcome! Back</h4>
							<h4>Login into your account</h4>
						</div>
						<!-- Form -->
						<form class="px-3">
							<!-- Input Box -->
							<div class="form-input">
								<span><i class="fa fa-envelope-o"></i></span>
								<input type="email" name="" placeholder="Email Address" tabindex="10"required>
							</div>
							<div class="form-input">
								<span><i class="fa fa-lock"></i></span>
								<input type="password" name="" placeholder="Password" required>
							</div>
							<div class="row mb-3">
									<!-- Remember Checkbox -->
								<div class="col-auto d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="cb1">
										<label class="form-check-label text-white" for="cb1">Remember me</label>
									</div>						
								</div>
							</div>
								<!-- Login Button -->
							<div class="mb-3"> 
								<button type="submit" class="btn btn-block">Login</button>
							</div>
							<div class="text-end">
								<a href="reset.html" class="forget-link">Forgot password?</a>
							</div>
							<div class="text-center mb-5 text-white">Don't have an account? 
								<a class="register-link" href="{{route('student-register')}}">Register here</a>
							</div>
						</form>
					</div>					
				</div>
				<!-- FORM CONTAINER END -->
			</div>
		</div>	
	</body>
</html>
