$(document).ready(function () {

    // This script will pass csrf token in all ajax based request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
