<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Software Developer -->
		<!-- Created by: {{developer}} -->
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<!-- Font Awesome CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<!-- Jconfirm CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
		<!-- Toast CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>TMS</title>
	</head>
	<body style="background-position: center;background-repeat: no-repeat;background-size: cover;height: 100vh;display: flex;align-items: center;">
		<div class="container-fluid" style="height: 100vh; background: linear-gradient( 90deg, #00467F, #4DB5B3);">
			<div class="row">
				<div class="col-sm-9 col-md-5 col-lg-4 mx-auto mt-5 col-10">
					<div class="card card-signin my-lg-5">
						<div class="card-body p-5">
							<center><span class="fas fa-user fa-5x"></span></center>
								
								<form class="form mt-3" action="/users/register" method="POST" autocomplete="off"> 
									{{csrf_field()}}
									<div class="form-group mb-2"> 
										<label class="font-weight-bold" for="email">Email Address</label>  
										<input class="form-control rounded-0" id="email" name="email" type="email" required="required" /> 
									</div> 
									<label class="font-weight-bold" for="first_name" data-toggle="tooltip">Name</label> 
									<div class="form-row mb-2">
										<div class="col">
											<input type="text" class="form-control rounded-0" placeholder="First Name" id="first_name" name="first_name" required="required">
										</div>
										<div class="col">
											<input type="text" class="form-control rounded-0" placeholder="Last Name" id="last_name" name="last_name" required="required">
										</div>
									</div>
									<label class="font-weight-bold" for="password">Password</label> 
									<div class="clearfix"></div> 
									<div class="form-row mb-2">
										<div class="col">
											<input type="password" class="form-control rounded-0" placeholder="Password" name="password" id="password" autocomplete="on" required="required">
										</div>
										<div class="col">
											<input type="password" class="form-control rounded-0" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" autocomplete="on" required="required">
										</div>
									</div>
									<button class="btn btn-outline-primary btn-block mt-4 mb-3 submit-button" type="submit"><span class="fas fa-user"></span> Register</button>

									<p class="text-black-50">Already a Member? Click Login</p>
									<a href="/users/login" class="btn btn-dark btn-block">Login</a>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Jquery -->	
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<!-- Bootstrap -->	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
		<!-- Jconfirm JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<!-- Toast JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
		<!-- Custom JS -->
		<script type="text/javascript" src="{{asset('/js/global.js')}}"></script>
		<!-- Software Developer -->
		<!-- Created by: {{developer}} -->
		{{-- Display success message --}}
		@if(session('success')) 
			<script type="text/javascript">
				$(document).ready(function() {
					success_message("{{session('success')}}");	
				});
			</script>
		@endif

		{{-- Display error message --}}
		@if(session('error')) 
			<script type="text/javascript">
				$(document).ready(function() {
					error_message("{{session('error')}}");	
				});
			</script>
		@endif
	</body>
</html>