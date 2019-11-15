<?php
    session_start(); //открытие сессии
    session_destroy(); //разрушение имеющейся сессии, выход из аккаунта
    header('Location: /index.php'); //переход на главную страницу
    exit;
?>
