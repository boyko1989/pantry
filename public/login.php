<?php session_start();
require_once '../config/connect.php';
require_once '../config/functions.php';
//Допустим мы зарегистрированы и хотим войти. Для этого нам нужно получить ПОСТОМ данные для входа. О том, что они имеются нам скажет нажатая кнопка submit.
if (isset($_POST['submit'])) {
//подключаемся к БД с целью найти пару логин и пароль
//если в массиве ПОСТ появляется значение в ключе логин, тогда делаем запрос к БД
$res = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' AND user_password='".mysqli_real_escape_string($link,$_POST['password'])."' LIMIT 1");
//Если запрос вернул 0 строк, значит пользователя нет и входа быть не может - отправляемся на страницу регистрации соответствующим сообщением
if (mysqli_num_rows($res) == 0) {
    $_SESSION['message'] = 'Такой пользователь не зарегистрирован';
    header("Location: register.php"); exit;
} //Если результат есть, то формируем массив $_SESSION и отправляемся в индексный файл
else {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['hash'] = md5(time()); //дескриптор пользователя
        $res = mysqli_query($link,"UPDATE `users` SET `user_hash` = '".$_SESSION['hash']."' WHERE `users`.`user_login` = '".$_POST['login']."'");
        $res_role = mysqli_query($link, "SELECT `user_role` FROM `users` WHERE `user_login` = '".$_POST['login']."'");
        $res_role = mysqli_fetch_assoc($res_role);
        $role = $res_role['user_role'];
        $_SESSION['user'] = $role;
        header("Location: /");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/regstyle.css" rel="stylesheet">
        <title>Приветствуем!</title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Вход</h1>
            </header>
            <main>
                <form class="form" method="POST">
                    <label>Логин</label><br><br>
                    <input type="text" name="login" required><br><br>

                    <label>Пароль</label><br><br>
                    <input type="password" name="password"><br><br>

                    <input name="submit" type="submit" value="Войти"><br><br>
                </form> 
                <?php if (isset($_SESSION)) {echo $_SESSION['message'];}?>
            </main>
        </div>      
    </body>
</html>       