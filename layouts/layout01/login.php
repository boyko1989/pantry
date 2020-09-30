<?php session_start();
require_once 'connect.php';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if (isset($_POST['submit'])) {

    //когда ключ [submit] не пуст, то подключаемся к БД с целью найти пару логин и пароль
    $res = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' AND user_password='".mysqli_real_escape_string($link,$_POST['password'])."' LIMIT 1");

    echo '<pre>';
    echo 'Результат запроса: '; 
    print_r($res);
    echo '</pre>';
        //Если запрос вернул 0 строк
        if (mysqli_num_rows($res) == 0) {
            echo 'Пользователь не найден, пожалуйста, <a href="register.php">зарегистрируйтесь</a>';
        } else {
                //Если результат нашёлся
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['hash'] = md5(time());
            $res = mysqli_query($link,"UPDATE `users` SET `user_hash` = '".$_SESSION['hash']."' WHERE `users`.`user_login` = '".$_POST['login']."'");
            $res_role = mysqli_query($link, "SELECT `user_role` FROM `users` WHERE `user_login` = '".$_POST['login']."'");
            $res_role = mysqli_fetch_assoc($res_role);
            $role = $res_role['user_role'];
            $_SESSION['user'] = $role;


            echo '<pre>';
            echo 'Результат апдейта БД: '; 
            print_r($res);
            echo '</pre>';

            echo '<pre>';
            echo 'Роль пользователя: '; 
            print_r($role);
            echo '</pre>';

            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';

            echo 'Переход на <a href="/">Главную</a>';
        }
    exit; 
    }   

echo '<h1>Вход</h1>
        <form method="POST">
        <label>Логин</label><br><br>
        <input type="text" name="login" required><br><br>

        <label>Пароль</label><br><br>
        <input type="password" name="password" required><br><br>

        <input name="submit" type="submit" value="Войти"><br><br>
    </form>';
    ?>