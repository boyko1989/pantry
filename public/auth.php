<?php
require_once '../config/connect.php';

    //проверяем содержание массива ПОСТ на соответствие логину/паролю

if (isset($_POST['auth_name'])) {
    $name = $_POST['auth_name'];
    $pass = $_POST['auth_pass'];
    $query = "SELECT * FROM `userssess` WHERE name = '$name' AND pass = '$pass'";
    $res = mysqli_query($link, $query) or trigger_error(mysqli_error() . $query);

    // если найдено соответствие в базе данных, то стартуем сессию, запоминаем в неё идентификатор пользователя и его IP, а потом переходим по адресу, который был ему изначально нужен.

    if ($row = mysqli_fetch_assoc($res)) {
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    }
    header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit;
}

//Чтобы разрушить сессию, нужно get-запросом передать ?action=logout

if (isset($_GET['action']) AND $_GET['action'] == "logout") {
    session_start();
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/");
    exit;
}

if (isset($_REQUEST[session_name()])) session_start(); //не свосем понял
if (isset($_SESSION['user_id']) AND $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) return; //не свосем понял
else { 
?>
    <form method="post">
        <input type="text" name="auth_name"><br>
        <input type="password" name="auth_pass"><br>
        <input type="submit"><br>
    </form>
<? } 
exit; ?>