<?php
session_start();

require_once "database/connect.php";
require_once "php/funcs.php";
$mysql = new mysqli('localhost','root','','online-books');
$books = get_books();
require_once 'modals/cart_form.php'
?>
<body>
<header class="header">
    <nav class="navbar header-nav">
        <div class="container">
            <div class="logo">
                <a class="logo-link" href="catalog.php">
                    <img src="partial/img/logo.svg" alt="Логотип">
                </a>
            </div>

<!--            --><?php //if($_SERVER['REQUEST_URI'] == '/online-books/catalog.php'): ?>
<!--                <form class="d-flex w-50" action="php/search.php?go" method="post">-->
<!--                    <div class="input-group">-->
<!--                        <input class="form-control search-input" type="text" name="search" value="" autocomplete="off" placeholder="Введите поисковый запрос" aria-describedby="btnGroup" required>-->
<!--                        <button class="btn btn-outline-light input-group-text" type="submit" id="btnGroup" name="enter"><i class="fa-solid fa-magnifying-glass"></i></button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            --><?php //endif; ?>

            <div class="btn-group">
                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <img src="partial/img/non-avatar.svg" class="rounded-circle"
                         alt="Avatar" />
                    <?= $_SESSION['user']['name']?>
                    <span class="pin-cart position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger btn-qty"><?= $_SESSION['cart.qty'] ?? ''?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                    <li><a class="btn dropdown-item link-item" href="profile.php?id=<?= $_SESSION['user']['id']?>">Профиль <i class="fa-solid fa-user fa-fw"></i></a></li>
                    <li class="position-relative"><a class="dropdown-item link-item" href="page-cart.php?id=<?= $_SESSION['user']['id']?>">Корзина
                        <?php if (isset($_SESSION['cart.qty']) > 0): ?>
                            <span class="position-absolute top-50 start-85 translate-middle badge rounded-pill bg-danger btn-qty"><?= $_SESSION['cart.qty'] ?? ''?></span>
                        <?php else: ?>
                            <i class="fa-solid fa-cart-shopping fa-fw"></i>
                        <?php endif; ?>
                        </a></li>
                    <li><a class="dropdown-item link-item text-danger" href="php/exit.php">Выйти <i class="fa-solid fa-arrow-right-from-bracket fa-fw"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>