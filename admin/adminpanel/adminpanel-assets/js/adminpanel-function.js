jQuery(document).ready(function($) {
    // Get current path and find target link
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if (path == '') {
        path = 'index.php';
    }

    var target = $('.nav a[href="' + path + '"]');
    // Add active class to target link
    target.addClass('active');
});


$(function() {
    $('input[type="time"][value="now"]').each(function() {
        var d = new Date(),
            h = d.getHours(),
            m = d.getMinutes();
        if (h < 10) h = '0' + h;
        if (m < 10) m = '0' + m;
        $(this).attr({
            'value': h + ':' + m
        });
    });
});