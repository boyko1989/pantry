<?php
session_start();
require_once '../config/connect.php';


if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
        print "Хм, что-то не получилось"; exit;
    } else {
        //print "Привет, ".$userdata['user_login'].". Всё работает!";
        $_SESSION['profile'] == 'user';
        header("Location: /");    
    }
} else {
    print "Включите куки";
} ?>