<?php
session_start();
require_once '../config/connect.php';
require_once '../config/functions.php';

//если в массиве ПОСТ появляется значение в ключе логин, тогда делаем запрос к БД
if (isset($_POST['login'])) {
    $query = mysqli_query($link, "SELECT guest_id FROM guest WHERE guest_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    //если запрос выдал 0 строк, то регистрируем нового пользователя
    if(mysqli_num_rows($query) == 0) {
        //проверяем корректность логина
        $err = [];
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }
        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30){
            $err[] = "Логин должен быть не менее 3-х символов и не больше 30";
        }
            //Если всё нормально, то отправляем данные в БД
            if(count($err) == 0) {
                $login = $_POST['login'];
                $hash = md5(generateCode(10));
                mysqli_query($link,"INSERT INTO guest SET guest_login='".$login."', guest_hash='".$hash."'");

                //Создам куки у пользователя
                //setcookie("id", "", time() - 3600*24, "/");
                //setcookie("hash", "", time() - 3600*24, "/", null, null, true);
                    //print_r($_COOKIE['id']);

                //И отправляемся на начальную страницу 
                //Как вариант для следующей строки: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']        
                $_SESSION['login'] = $login;
                $_SESSION['hash'] = $hash;
                $_SESSION['profile_guest'] = 'guest';
                header("Location: /"); exit();
            } 

            //Если есть ошибки при вводе логина, то вывести их список на экран
            else {
                echo "<b>При регистрации произошли следующие ошибки:</b><br>";
                foreach($err AS $error) {
                    echo $error."<br>";
                }
            }
    }
    //если запрос выдал больше нуля строк, 
    //тогда создаём сессию и записываем туда тип профиля и логин пользователя и отправляемся на начальную страницу
    if(mysqli_num_rows($query) > 0) {
        $_SESSION['profile_guest'] = 'guest';
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['hash'] = $hash;
        header("Location: /");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/regstyle.css" rel="stylesheet">
        
        <title>Гостевой</title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Гостевой</h1>
            </header>
            <main>
                <form class="form" method="POST">
                    <label>Логин</label><br><br>
                    <input type="text" name="login" required><br><br>                    
                    
                    <input name="submit" type="submit" value="Зарегистрироваться"><br><br>
                </form>
            </main>
        </div>      
    </body>
</html>