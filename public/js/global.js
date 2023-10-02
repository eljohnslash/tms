//Software Developer
//Created by: Eljohn Duñgo 2021
// -- Function to prevent multiple form submit
// -- Disables button and add loading indicator
function btn_loading(button){

	var text = button.html();
	button.html('<i class="fas fa-spinner fa-spin"></i> ' + text);
	button.prop('disabled', true);
	
}
// -- Enables button and remove loading indicator
function btn_stop_loading(button){

	var text = button.html();
	var new_text = text.replace('<i class="fas fa-spinner fa-spin"></i> ', '');
	button.html(new_text);
	button.prop('disabled', false);
	
}
// Displays success message
// Param either text or array
function success_message(text){

	$.toast({
	    heading: 'Success',
	    text: text,
	    position: 'top-right',
        loader: false,
        bgColor: '#28a745',
        textColor: 'white',
        icon: 'success'
	});

}
// Displays error message
// Param either text or array
function error_message(text){

	if (text.length == 1) {
		text = text[0].toString();
	}
	$.toast({
	    heading: 'Failed',
	    text: text,
	    position: 'top-right',
	    loader: false,
	    bgColor: '#dc3545',
	    textColor: 'white',
	    icon: 'error'
	});

}

function ajax_validation_error(errors, submit_button){
	
	let errorMessage = [];
	let i = 0;
	if (errors) {
		$.each(errors['errors'], function (index, value) {
			errorMessage[i] = value;
			i++;
		});

		error_message(errorMessage);

	} else {

		error_message('Something went wrong. Please reload the page.');

	}
	// -- Calls button stop load function
	btn_stop_loading(submit_button);
	// return false;
}

function ajax_response_error(errors, submit_button){

	var errorMessage = [];
	var i = 0;
	$.each(errors, function (index, value) {
	    errorMessage[i] = value;
	    i++;
	});

	error_message(errorMessage);

	// -- Calls button stop load function
	btn_stop_loading(submit_button);

}
//Software Developer
//Created by: Eljohn Duñgo 2021