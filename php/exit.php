<?php
 session_start();
 unset($_SESSION['user']);
 setcookie('user', $user['name'], time() - 3600, "/");
// session_destroy();
 header('Location: /online-books/login.php');
?>

