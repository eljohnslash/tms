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
							<form method="POST" action="/users/login" class="mt-3">
								{{csrf_field()}}
								<label class="font-weight-bold" for="email_address">Email Address</label>
								<div class="input-group mb-3 mr-sm-2">
									<div class="input-group-prepend">
										<div class="input-group-text"><span class="fas fa-fw fa-envelope"></span></div>
									</div>
									<input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email" required="required">
								</div>
								<label class="font-weight-bold" for="password">Password</label>
								<div class="input-group mb-3 mr-sm-2">
									<div class="input-group-prepend">
										<div class="input-group-text"><span class="fas fa-fw fa-lock"></span></div>
									</div>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
								</div>
								<div class="row">
									<div class="col-12">
										<button class="btn btn-outline-primary btn-block mt-4 mb-3 submit-button" type="submit" name="login" id="do_login"><span class="fas fa-sign-in-alt"></span> Login</button>
									</div>
									<div class="col-12">
										<p class="text-black-50">Not yet a member? Click Register</p>
										<a href="/users/register" class="btn btn-primary btn-block btn-dark">Register</a>
									</div>
								</div>
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