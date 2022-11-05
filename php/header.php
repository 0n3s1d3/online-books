<?php
session_start();

require_once "database/connect.php";
require_once "php/funcs.php";
$mysql = new mysqli('localhost','root','','online-books');
$books = get_books();
require_once 'modals/cart_form.php'
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="partial/css/normalize.css">
    <link rel="stylesheet" href="partial/css/bootstrap.min.css">
    <link rel="stylesheet" href="partial/css/all.css">
    <link rel="stylesheet" href="partial/css/style.css">
    <link rel="icon" type="image/ico" href="partial/img/logo.ico">
    <title>Online Books - Книжный магазин</title>
</head>
<body>
<header class="header">
    <nav class="navbar header-nav">
        <div class="container">
            <div class="header_logo">
                <a class="header_logo-link" href="catalog.php">
                    <img src="partial/img/logo.svg" alt="Логотип">
                </a>
            </div>

            <form class="d-flex w-50" method="get">
                <div class="input-group">

                    <input class="form-control" type="search" placeholder="Поиск..." aria-label="Search" aria-describedby="btnGroup">
                    <button class="btn btn-outline-light input-group-text" type="submit"  id="btnGroup"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <div class="btn-group">
                <a type="button" class="btn btn-secondary" href="profile.php?id=<?= $_SESSION['user']['id']?>">Привет, <?=$_SESSION['user']['login']?></a>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="page-cart.php?id=<?= $_SESSION['user']['id']?>">Корзина</a></li>
                    <li><a class="dropdown-item" href="php/exit.php">Выйти</a></li>

                </ul>
            </div>
            <a class="btn btn-dark btn-cart" href="page-cart.php?id=<?= $_SESSION['user']['id']?>">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger btn-qty"><?= $_SESSION['cart.qty'] ?? 0?></span>
            </a>
        </div>
    </nav>
</header>