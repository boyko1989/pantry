<?php session_start();
    //проверяем, начал ли конкретный пользователь сессию?
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    if ($_SESSION['hash'] != "") {
        if ($_SESSION['user'] === 'user') {
            $role = 'полноправный зарегистрированный пользователь';
        }   
        if ($_SESSION['user'] === 'guest') {
            $role = 'гость';
        }        
              
        echo '<h1>Пользователь '.$_SESSION['login'].' вошёл как ' .$role.'!</h1>
            <p>Для выхода нажмите <a href="logout.php">сюда</a></p>';
        //если пользователя нет, то предлагаем войти или зарегистрироваться
    } else {
        echo 'Никто не входил! <br> 
        Вам нужно <a href="login.php">войти</a>, <a href="register.php">зарегистрироваться</a> или выбрать <a href="guestregister.php">гостевой</a> профиль.';        
    }
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

?>