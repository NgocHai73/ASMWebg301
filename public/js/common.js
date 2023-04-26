$(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Accept: "application/json",
        },
    });
});

function callAjax(url, data = {}, method = 'GET') {
    return $.ajax({
        url: url,
        data: data,
        type: method
    });
}

function callAjaxWithFormData(url, data = {}, method = 'POST') {
    return $.ajax({
        url: url,
        data: data,
        type: method,
        contentType: false,
        processData: false,
    });
<<<<<<< HEAD
}
=======
}
>>>>>>> 5da5bf05f53759c6592816348dc7a509c3121d4e
