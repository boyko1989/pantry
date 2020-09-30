<?php 
session_start();
require_once '../config/functions.php';
//если имеется дескриптор пользователя, значит произведён вход, значит отображаем стартовую страницу сервиса
    if ($_SESSION['hash'] != "") {
        //сразу проверяем роль пользователя
        if ($_SESSION['user'] === 'user') {
            $role = 'полноправный зарегистрированный пользователь';
        }   
        if ($_SESSION['user'] === 'guest') {
            $role = 'гость';
        }
        
        bem_head('Главная');
        bem_header('Мои файлы');
        echo '<h1>Пользователь '.$_SESSION['login'].' вошёл как ' .$role.'!</h1>';
        ?>
            <main>
                <div class="doubleline"> 
                    <hr color="black" noshade size="2px"></div>
                <div class="con_menu">
        <?php  
            menu1(); 
            menu2();               
            echo '</div><div class="doubleline3"></div>';
            listing();
        ?>    
                <div class="doubleline"> 
                    <hr color="black" noshade size="2px">           
                </div>
            </main>      
        </body>
        </html>
        <?php footer();
    } 
    //если дескриптора пользователя нет, то отображаем приветственную страницу
    else {
        hello_form(); exit;
    }
?>