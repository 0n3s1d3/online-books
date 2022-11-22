$(function () {

    function showCart(cart) {
        $('#cartModal .modal-cart-content').html(cart);
        $('#cartModal').modal('show');

        let cartQty = $('#modal-cart-qty').text() ? $('#modal-cart-qty').text() : 0;
        $('.btn-qty').text(cartQty);
    }

    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'add', id: id},
            dataType: 'json',
            success: function (result) {
                if (result.code == 'ok') {
                    showCart(result.answer);
                } else {
                    console.log(result.answer);
                }
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $('#clear-cart').on('click', function () {
        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'clear'},
            success: function (result) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $('#send_order').submit(function(e) {
        e.preventDefault()
        var form_data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'send.php',
            data: form_data,
            success: function(data) {
                alert('Заказ отправлен');
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $('#clear-order').on('click', function () {
        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'clear'},
            success: function (result) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
    });

});