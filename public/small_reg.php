<?php

require_once '../config/connect.php';

$login = $_POST['login'];

$res = mysqli_query("INSERT INTO users VALUES ('$login')");

?>