<?php
$login = $_POST['login'];
$pass = $_POST['password'];
$result = 0;
foreach (file('User.dat') as $k)
    if($k == $login . '|' . $pass) {
        $result = 1;
    break;
    }
    if ($result != 1) die("Несанкционированный доступ");
    session_start();
    $_SESSION['autorize']=1;
    header("Location: /"); 