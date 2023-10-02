//Software Developer
//Created by: Eljohn Duñgo
$(document).ready(function() {
	tasks.add();
	tasks.edit();
	tasks.delete();
});

var tasks = {

	add: function () {

        $(document).on('click', '#add-task', function () {

            var content = '<div class="p-3">' +
                            '<form class="form" id="add_task_form">' +
                                '<div class="form-group mb-3">' +
                                    '<label for="title" class="text-custom-blue font-weight-bolder">Title</label>' +
                                    '<input type="title" class="form-control" id="title" required="required" name="title">' +
                                '</div>' +
								'<div class="form-group mb-3">' +
                                    '<label for="description" class="text-custom-blue font-weight-bolder">Description</label>' +
                                    '<textarea required="required" name="description" class="form-control" id="description"></textarea>' + 
                                '</div>' +
								'<div class="form-group mb-3">' +
                                    '<label for="status" class="text-custom-blue font-weight-bolder">Status</label>' +
                                    '<select class="form-control" id="status" name="status">' + 
										'<option value="To Do">To Do</option>' + 
										'<option value="In Progress">In Progress</option>' + 
										'<option value="Completed">Completed</option>' + 
									'</select>' + 
                                '</div>' +
                                '<div class="mx-0 row mb-1">' +
                                    '<div class="col-6"><button class="btn btn-block btn-primary submit-button" type="submit">Submit</button></div>' +
                                    '<div class="col-6"><button class="btn btn-block btn-outline-info cancel-button" type="button">Cancel</button></div>' +
                                '</div><div class="clearfix"></div>' +
                            '</form>' +
                            '</div>';
            $.alert({
                title: '<h1 class="px-3 h4 text-center text-custom-blue">Add Task</h1>',
                content: content,
                buttons: false,
                closeIcon: true,
                columnClass: 'col-lg-5 col-sm-8 col-10 offset-1 offset-lg-0 offset-sm-0',
                scrollToPreviousElement: false,
                draggable: false,
                animateFromElement: false,
                onOpenBefore: function () {
                    // when content is fetched & rendered in DOM
                    var self = this;

                    $('body').css('overflow', 'hidden');

                    tasks.add_submit(self);

                    $('.cancel-button').click(function () {
                        self.close();
                    });

                },
                onClose: function () {
                    $('body').css('overflow', 'auto');
                }
            });
        })

    },
    add_submit: function(jconfirm) {

        $("#add_task_form").on("submit", function (event) {
            // -- Prevents form submit
            event.preventDefault();
            //Gets form data
            var data = $(this).serialize();
            // -- Find submit button and assign to variable
            var submit_button = $(this).find('button.submit-button');
            // -- Calls button load function
            btn_loading(submit_button);

            $.ajax({
                type: "POST",
                url: "/tasks",
                data: data,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {

                    if (result == 1) {

                        jconfirm.close();

                        success_message('Task successfully added.');

						setTimeout(function(){
							location.reload();
						},1000);


                    } else {
                        ajax_response_error(result, submit_button); // parameters (response and submit button)
                        return false;
                    }

                },
                error: function (jqXhr, json, errorThrown) {
                    ajax_validation_error(jqXhr.responseJSON, submit_button); // parameters (error and submit button)
                    return false;
                }
            });
        });
    },
	edit: function () {

        $(document).on('click', '.edit-task', function () {

			var status = $(this)

			$('#status').val($(this).data('status'));

            var content = '<div class="p-3">' +
                            '<form class="form" id="edit_task_form">' +
                                '<div class="form-group mb-3">' +
                                    '<label for="title" class="text-custom-blue font-weight-bolder">Title</label>' +
                                    '<input type="hidden" class="form-control" id="id" required="required" name="id" value="'+$(this).data('id')+'">' +
									'<input type="title" class="form-control" id="title" required="required" name="title" value="'+$(this).data('title')+'">' +
                                '</div>' +
								'<div class="form-group mb-3">' +
                                    '<label for="description" class="text-custom-blue font-weight-bolder">Description</label>' +
                                    '<textarea required="required" name="description" class="form-control" id="description">'+$(this).data('title')+'</textarea>' + 
                                '</div>' +
								'<div class="form-group mb-3">' +
                                    '<label for="status" class="text-custom-blue font-weight-bolder">Status</label>' +
                                    '<select class="form-control" id="status" name="status">' + 
										'<option value="To Do">To Do</option>' + 
										'<option value="In Progress">In Progress</option>' + 
										'<option value="Completed">Completed</option>' + 
									'</select>' + 
                                '</div>' +
                                '<div class="mx-0 row mb-1">' +
                                    '<div class="col-6"><button class="btn btn-block btn-primary submit-button" type="submit">Submit</button></div>' +
                                    '<div class="col-6"><button class="btn btn-block btn-outline-info cancel-button" type="button">Cancel</button></div>' +
                                '</div><div class="clearfix"></div>' +
                            '</form>' +
                            '</div>';
            $.alert({
                title: '<h1 class="px-3 h4 text-center text-custom-blue">Edit Task</h1>',
                content: content,
                buttons: false,
                closeIcon: true,
                columnClass: 'col-lg-5 col-sm-8 col-10 offset-1 offset-lg-0 offset-sm-0',
                scrollToPreviousElement: false,
                draggable: false,
                animateFromElement: false,
                onOpenBefore: function () {
                    // when content is fetched & rendered in DOM
                    var self = this;

                    $('body').css('overflow', 'hidden');

                    tasks.edit_submit(self);

                    $('.cancel-button').click(function () {
                        self.close();
                    });

                },
                onClose: function () {
                    $('body').css('overflow', 'auto');
                }
            });
        })

    },
    edit_submit: function(jconfirm) {

        $("#edit_task_form").on("submit", function (event) {
            // -- Prevents form submit
            event.preventDefault();
            //Gets form data
            var data = $(this).serialize();
            // -- Find submit button and assign to variable
            var submit_button = $(this).find('button.submit-button');
            // -- Calls button load function
            btn_loading(submit_button);

            $.ajax({
                type: "POST",
                url: "/tasks/update",
                data: data,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {

                    if (result == 1) {

                        jconfirm.close();

                        success_message('Task successfully added.');

						setTimeout(function(){
							location.reload();
						},1000);


                    } else {
                        ajax_response_error(result, submit_button); // parameters (response and submit button)
                        return false;
                    }

                },
                error: function (jqXhr, json, errorThrown) {
                    ajax_validation_error(jqXhr.responseJSON, submit_button); // parameters (error and submit button)
                    return false;
                }
            });
        });
    },
	delete: function () {

        $(document).on('click', '.delete-task', function () {

            var id = $(this).data('id');

            var content = '<div class="text-center text-danger mt-3"><span class="fas fa-trash-alt fa-2x"></span></div>' +
                '<div class="mt-3 mb-4"><p class="text-center text-danger">Are you sure you want to delete this?</p></div>' +
                '<div class="mx-0 row mb-4">' +
                '<div class="col-6"><button class="btn btn-block btn-danger submit-button">Yes</button></div>' +
                '<div class="col-6"><button class="btn btn-block btn-outline-info cancel-button">Cancel</button></div>' +
                '</div><div class="clearfix"></div>';
            $.alert({
                title: '',
                content: content,
                buttons: false,
                closeIcon: true,
                columnClass: 'col-lg-4 col-sm-8 col-10 offset-1 offset-lg-0 offset-sm-0',
                scrollToPreviousElement: false,
                draggable: false,
                animateFromElement: false,
                onOpenBefore: function () {
                    // when content is fetched & rendered in DOM
                    var self = this;

                    $('body').css('overflow', 'hidden');

                    $('.submit-button').click(function () {
                        var button = $(this);
                        tasks.delete_submit(self, button, id); // params jconfirm instance, submit button, id to delete
                    });

                    $('.cancel-button').click(function () {
                        self.close();
                    });

                },
                onClose: function () {
                    $('body').css('overflow', 'auto');
                }
            });
        })

    },
    delete_submit: function (jconfirm, button, id) {
        //Gets form data
        var data = { 'id': id };

        // -- Find submit button and assign to variable
        var submit_button = button;

        // -- Calls button load function
        btn_loading(submit_button);

        $.ajax({
            type: "POST",
            url: "/tasks/delete",
            data: data,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {

                if (result == 1) {

                    jconfirm.close();

                    success_message('Task successfully deleted.');

						setTimeout(function(){
							location.reload();
						},1000);

                } else {
                    ajax_response_error(result, submit_button); // parameters (response and submit button)
                    return false;
                }

            },
            error: function (jqXhr, json, errorThrown) {
                ajax_validation_error(jqXhr.responseJSON, submit_button); // parameters (error and submit button)
                return false;
            }
        });
    },
}

//Software Developer
//Created by: Eljohn Duñgo