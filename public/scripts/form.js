$(document).ready(function() {
    $('#siteForm').on('submit', function(event) {
        event.preventDefault();

        const name = $('#name-field').val().trim();
        const email = $('#email-field').val().trim();
        const message = $('#message-field').val().trim();
        $('#formError').text('').css('display', 'none');
        $('#formSuccess').text('').css('display', 'none');

        if (!name || !email || !message) {
            $('#formError').text('Пожалуйста, заполните все поля.').css('display', 'block');
            return;
        }

        const formData = {
            name: name,
            email: email,
            message: message
        };

        $.ajax({
            url: '/form/index',  // URL контроллера
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#formSuccess').text(response.error || 'Сообщение успешно отправлено.').css('display', 'block');
                } else {
                    $('#formError').text(response.error || 'Произошла ошибка.').css('display', 'block');
                }
            },
            error: function(xhr, status, error) {
                console.error('Ошибка при отправке данных:', error);
                $('#formError').text('Произошла ошибка при отправке данных.').css('display', 'block');
            }
        });
    });
});