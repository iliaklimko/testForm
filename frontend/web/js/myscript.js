$(document).ready(function () {
    $(document).on('click', '.btnShowMessage', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/',
            type: 'post',
            data: {'method': 'getLastMessage'},
            success: function (response) {
                if (response == 'error') {
                    $('.lastMessageText').html('Отправленных сообщений нету');
                } else {
                    $('.lastMessageText').html('Ваше последнее сообщение: ' + response);
                }
            }
        });
    });
});