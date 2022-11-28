$(document).on('submit', '.user-form', function (e) {
    e.preventDefault();
    let fd = $('.user-form').serialize();
    $.ajax({
        url: '/add_user.php',
        method: 'post',
        // dataType: 'html',
        data: fd,
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                $('.user-form').trigger('reset');
                $('.user-form .form-footer .result').addClass('success').text('Успешно');
            } else {
                $('.user-form .form-footer .result').addClass('error').text('Ошибка');
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
})
$(document).on('click', '.unload', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/google.php',
        method: 'post',
        // dataType: 'html',
        data: {},
        success: function (data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                console.log(data);
                $('.unload-block .result').addClass('success').text('Успешно');
            } else {
                $('.unload-block .result').addClass('error').text('Ошибка');
                console.log(data);
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
})