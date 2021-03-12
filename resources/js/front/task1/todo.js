const Swal = require('sweetalert2');

$(document).ready(function () {

    let action = '';
    let method = '';
    let formId = '';
    let $outputId = $('#task1_table');


    // Get submit event
    $('#create_todo').submit(function (event) {
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
                    $outputId.append(data.html);

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


    function showFormErrors(formId, errors) {
        $.each($('#' + formId).serializeArray(), function (i, fields) {
            let input = $('input[name=' + fields.name + ']');
            let fieldName = input.attr('name');

            if (errors[fieldName] !== undefined) {
                input.after('<span class="text-danger form-error">' + errors[fieldName] + '</span>');
            }
        });
    }


    function clearFormErrors() {
        $('.form-error').remove();
    }

// check output TRUE:FALSE
// show output to user
});
