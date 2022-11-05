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

    $('#get-cart').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'show'},
            success: function (result) {
                showCart(result);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $('#cartModal .modal-cart-content').on('click', '#clear-cart', function () {
        $.ajax({
            url: 'cart.php',
            type: 'GET',
            data: {cart: 'clear'},
            success: function (result) {
                showCart(result);
            },
            error: function () {
                console.log('error');
            }
        });
    });
});