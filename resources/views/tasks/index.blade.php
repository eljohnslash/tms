<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<!-- Software Developer -->
	<!-- Created by: {{developer}} -->
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
<body>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
			<a class="navbar-brand" href="#">TMS</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0 float-right">
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<a href="/users/logout" class="btn btn-primary my-2 my-sm-0 btn-sm"><span class="fas fa-sign-out-alt"></span> Sign out</a>
				</form>
			</div>			
		</nav>
		<div class="container mt-5">
			<h1 class="h3">
				Tasks
				<button class="btn btn-primary btn-sm float-right" id="add-task"><span class="fas fa-plus"></span> Add Task</button>
			</h1>
			<div class="table-responsive">
				<table class="table table-striped" id="task-table">
					<thead>
						<tr>
							<th class="text-center">Title</th>
							<th class="text-center">Description</th>
							<th class="text-center">Status</th>
							<th class="text-center">Options</th>
						</tr>
					</thead>
					<tbody>
						@if (count($tasks) > 0)
							@foreach ($tasks as $task)
							<tr>
								<td class="text-center">{{$task->title}}</td>
								<td class="text-center">{{$task->description}}</td>
								<td class="text-center">{{$task->status}}</td>
								<td class="text-center" style="width:200px">
									<div class="btn-group">
										<button class="edit-task btn btn-sm btn-warning text-light" data-id="{{$task->id}}" data-title="{{$task->title}}" data-description="{{$task->description}}" data-status="{{$task->status}}"><span class="fas fa-edit"></span> Edit</button>
										<button class="delete-task btn btn-sm btn-danger" data-id="{{$task->id}}"><span class="fas fa-trash"></span> Delete</button>
									</div>
								</td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="4" class="text-center">No data.</td>
							</tr>
						@endif
					</tbody>
				</table>
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
		<script type="text/javascript" src="{{asset('/js/tasks.js')}}"></script>
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