$('[name="log_switch"]').change(function () {
    $.ajax({
        type: 'GET',
        url: _base_url + "toggle_log",
        data: {
            toggle_log: this.value
        },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (response) {
            Swal.fire({
                title: response.title,
                text: response.message,
                icon: "success",
                allowOutsideClick: false
            });
        },
        error: function (response) {
            alert('An error occured !');
        }
    });
});
$('[data-action="install"]').click(function () {
    $.ajax({
        type: 'GET',
        url: _base_url + "install",
        data: {},
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (response) {
            Swal.fire({
                title: response.title,
                text: response.message,
                icon: "success",
                allowOutsideClick: false
            }).then((result) => {
                // Reload the Page
                location.href = _base_url + 'settings';
            });
        },
        error: function (response) {
            alert('An error occured !');
        }
    });
});