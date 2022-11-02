<?php
    require_once "database/connect.php";
    $mysql = new mysqli('localhost','root','','online-books');
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
    <link rel="stylesheet" href="partial/css/all.min.css">
    <link rel="stylesheet" href="partial/css/style.css">
    <title>Online Books - Книжный магазин</title>
</head>
<body>
<?php include 'php/header.php' ?>

<?php include 'php/footer.php' ?>
<script src="partial/js/bootstrap.bundle.min.js"></script>
<script src="partial/js/all.min.js"></script>
</body>
</html>