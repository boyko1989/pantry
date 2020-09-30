<?php session_start();
require_once 'connect.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

if (isset($_POST['submit'])) {

    //проверка данных    
    //для начала следует проветить наличие логина в БД
    $res = mysqli_query($link,"SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    
    echo '<pre>';
    echo 'Результат запроса: '; 
    print_r($res);
    echo '</pre>';
    
    if (mysqli_num_rows($res) != 0){
        echo "Такой пользователь есть!"; 
        exit;
    } //если пользователя с таким логином/паролем нет ...
    else {
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
            echo '<h3>Успешно!</h3><br><a href="/">На главную</a>';
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';
            
            exit;
        } //если ошибки при вводе регистрационных записей были, то выводим их список и форму
        else {
            echo "<b>При регистрации произошли следующие ошибки:</b><br>";
            foreach($err as $error) {
                echo $error."<br>";
            }
        }
    }    
}

echo ' <h1>Регистрация</h1>
        <form method="POST">
            <label>Логин</label><br><br>
            <input type="text" name="login" required><br><br>

            <label>Пароль</label><br><br>
            <input type="password" name="password" required><br><br>

            <input name="submit" type="submit" value="Зарегистрироваться"><br><br>
        </form>';
?>