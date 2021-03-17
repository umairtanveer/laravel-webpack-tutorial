const Swal = require('sweetalert2');

$(document).ready(function () {

    let action = '';
    let method = '';
    let formId = '';
    let $outputId = $('#task1_table');


    // Get submit event
    $('#create_todo, #update_todo').submit(function (event) {
        event.preventDefault();

        formId = $(this).attr('id');
        action = $(this).attr('action');
        method = $(this).attr('method');

        loading(true);
        clearFormErrors();

        // Load form data
        // pass data to controller using ajax
        $.ajax({
            url: action,
            type: method,
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function (data) {

                if (data.success == false) {
                    showFormErrors(formId, data.errors);
                } else {
                    document.getElementById(formId).reset();
                    $('.modal').modal('hide');

                    // Table updations will be active after tomorrow DATA TABLE lecture
                    // $outputId.append(data.html);

                    Swal.fire(
                        'Success!',
                        data.message,
                        'success'
                    );
                }

                loading(false);
            },
            error: function (err) {
                loading(false);

                Swal.fire(
                    'Alert!',
                    err.message,
                    'error'
                );
            }
        });
    });


    // Hide/Show loading on submit of form
    function loading(state) {
        let $submitBtn = $('#submit_btn');
        let $processingBtn = $('#processing_btn');

        switch (state) {
            case true:
                $submitBtn.hide();
                $processingBtn.show();
                break;
            case false:
                $processingBtn.hide();
                $submitBtn.show();
                break;
            default:
            // do nothing
        }
    }


    // Show error in any form you just need to pass Errors_Array and Form_ID
    function showFormErrors(formId, errors) {
        let formInputsFields = $('#' + formId).serializeArray();

        $.each(formInputsFields, function (key, field) {
            let fieldName = field.name;

            if (errors[fieldName] !== undefined) {
                $("[name='" + fieldName + "']").after('<span class="text-danger form-error">' + errors[fieldName] + '</span>');
            }
        });
    }


    function clearFormErrors() {
        $('.form-error').remove();
    }


    // View btn
    $('.view_todo').click(function () {
        let data = $(this).data('row');

        $('#show_id').text(data.id);
        $('#show_title').text(data.title);
        $('#show_author').text(data.author);
        $('#show_date').text(data.date);
        $('#show_list').text(data.list);

        $('#detailTodoForm').modal('show');
    });

    // Edit btn
    $('.edit_todo').click(function () {
        let data = $(this).data('row');

        $('#edit_id').val(data.id);
        $('#edit_title').val(data.title);
        $('#edit_author').val(data.author);
        $('#edit_date').val(data.date);

        // Its a text area thats why i set HTML too
        $('#edit_list').val(data.list);
        $('#edit_list').html(data.list);

        $('#updateTodoForm').modal('show');
    });

    // Delete btn
    $('.delete_todo').click(function () {
        let id = $(this).data('id');

        Swal.fire({
            title: 'Do you want to delete TODO #' + id + '?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: `Yes! Fuck this`,
            denyButtonText: `No! Thanks`,
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '/task1/ajax/todo/delete',
                    type: 'POST',
                    data: {'id': id},
                    dataType: 'JSON',
                    success: function (data) {

                        if (data.success == true) {
                            Swal.fire('Deleted!', 'Todo #' + id + ' is deleted successfully', 'success')
                        } else {
                            Swal.fire('Alert!', data.message, 'error');
                        }
                    },
                    error: function (err) {
                        Swal.fire('Alert!', err.message, 'error');
                    }
                });
            }
        });

    });


// check output TRUE:FALSE
// show output to user
});
