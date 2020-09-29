<?php
    $servername = "localhost";
    $username = "root";
    $password = "XE2Z5NMNXE2Z5NMN";
    $dbname = "pantry";

    $link = mysqli_connect($servername, $username, $password, $dbname) or die('Ошибка соединения с базой данных!');
    if (!$link) die(mysqli_connect_error());

    //mysqli_set_charset($link, "utf8") or die('Не установлена кодировка!');
?>
