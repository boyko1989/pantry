<?php session_start();
require_once '../config/connect.php';
//Допустим мы хотим зарегистрироваться. Для этого нам нужно получить ПОСТОМ данные для отправки в БД. О том, что они имеются нам скажет нажатая кнопка submit.
if(isset($_POST['submit'])) {    
    //проверка данных    
    //для начала следует проветить наличие логина в БД
    $res = mysqli_query($link,"SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."' LIMIT 1");
    //если такой пользователь есть отправляемся в логину и выходим из скрипта
    if (mysqli_num_rows($res) != 0){
        $_SESSION['message'] = 'Такой пользователь есть, Вы можете войти';
        header("Location: login.php"); 
        exit;
    } //если пользователя с таким логином нет ...
    else { //начинаем вести список ошибок
        $err = [];
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }

        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
            $err[] = "Логин должен быть не менее 3-х символов и не больше 30";
        }            //если ошибок нет, то заносим пользователя в БД и переходим на Главную
        if(count($err) == 0) {
            $_SESSION['user'] = 'user';
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['hash'] = md5(time());

            $res_insert = mysqli_query($link, "INSERT INTO `users` SET user_login='".$_POST['login']."', user_password='".$_POST['password']."', user_hash='".$_SESSION['hash']."', user_role='user'");
            exit;
        }//если ошибки при вводе регистрационных записей были, то выводим их список и форму
        else {
            echo "<b>При регистрации произошли следующие ошибки:</b><br>";
            foreach($err as $error) {
                echo $error."<br>";
            }
        }
    }
} ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/regstyle.css" rel="stylesheet">
        
        <title>Регистрация пользователя</title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Регистрация пользователя</h1>
            </header>
            <main>
                <form class="form" method="POST">
                    <label>Логин</label><br><br>
                    <input type="text" name="login" required><br><br>
                    
                    <label>Пароль</label><br><br>
                    <input type="password" name="password"><br><br>

                    <input name="submit" type="submit" value="Зарегистрироваться"><br><br>
                </form>    
                <?php if (isset($_SESSION)) {echo $_SESSION['message'];}?>            
            </main>
        </div>      
    </body>
</html>