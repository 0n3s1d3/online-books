<?php
    try
    {
        $pdo = new PDO('mysql:host=localhost; port=3306; dbname=online-books', 'root', '');
        $pdo->exec('SET NAMES "utf8"');
    }
    catch (PDOException $e)
    {
        echo "Соединение не установлено";
        include 'error.php';
        exit();
    }
?>