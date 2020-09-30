<?php session_start();
require_once '../config/connect.php';
require_once '../config/functions.php';

//если в массиве ПОСТ появляется значение в ключе логин, тогда делаем запрос к БД
if(isset($_POST['login'])) {
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password']))) {
        // Генерируем случайное число, шифруем его и добавляем в БД
        //$hash = md5(generateCode(10));
        $hash = md5(generateCode(10));

        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['hash'] = $hash;
        $_SESSION['profile'] = 'user';
        /*
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';*/
    
        // Переадресовываем браузер на старт
        header("Location: /"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
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
                    <input type="password" name="password" required><br><br>

                    <input name="submit" type="submit" value="Войти"><br><br>
                </form> 
            </main>
        </div>      
    </body>
</html>           