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