<?php
    session_start();
    require_once "database/connect.php";
    require_once "php/funcs.php";

    if (isset($_GET['cart'])) {
        switch ($_GET['cart']) {
            case 'add':
                $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                $book = get_book($id);

                if (!$book) {
                    echo json_encode(['code' => 'error', 'answer' => 'Error book']);
                } else {
                    add_to_cart($book);
                    ob_start();
                    require_once 'cart_modal.php';
                    $cart = ob_get_clean();
                    echo json_encode(['code' => 'ok', 'answer' => $cart]);
                }
                break;

            case 'show':
                require_once 'cart_modal.php';
                break;

            case 'clear':
                if (!empty($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                    unset($_SESSION['cart.sum']);
                    unset($_SESSION['cart.qty']);
                }
                require_once 'cart_modal.php';
                break;
        }
    }
?>