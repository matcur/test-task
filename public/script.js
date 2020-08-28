var domainUrl = 'http://test-task/'

$('#order-call').click(() => {
    $('#order-call-form').toggle();
})

$('#order-call-btn').click((e) => {
    e.preventDefault();

    let userPhone = $('#order-phone').val();
    let userName = $('#order-user-name').val();

    $.ajax({
        url: domainUrl + 'api/send_order_call_mail',
        method: 'post',
        dataType: 'json',
        data: {
            user_phone: userPhone,
            user_name: userName,
        },
        success: (data) => {
            $('#order-call-form').hide();

            $('#order-is-called').show();

            setInterval(() => $('#order-is-called').hide(), 5000);

            let orderIsSent = $('#order-is-sent');

            orderIsSent.show();
            orderIsSent.addClass('down');
            setInterval(() => orderIsSent.removeClass('down'), 3000);
        }
    });
})
