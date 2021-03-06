const Swal = require('sweetalert2');

$(document).ready(function () {

    $('.confirm').click(function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure to leave this page?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Approved!',
                    'Page change request is approved.',
                    'success'
                );
                window.location = $(this).attr('href');
            } else {
                Swal.fire(
                    'Thank You!',
                    'Thank you for staying with us.',
                    'info'
                );
            }
        })
    });


    $('yourFormID_OR_CLASS').submit(function (event) {
        event.preventDefault();

        let action = $(this).attr('action');
        let method = $(this).attr('method');

        // do ajax call
    });


});
