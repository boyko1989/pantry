<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "pantry";

    $link = mysqli_connect($servername, $username, $password, $dbname) or die('Ошибка соединения с базой данных!');
    if (!$link) die(mysqli_connect_error());

    //mysqli_set_charset($link, "utf8") or die('Не установлена кодировка!');
?>
