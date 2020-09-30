<?php 
session_start();
require_once '../config/functions.php';
//if (!isset($_COOKIE['id'])) {

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
if (!isset($_SESSION['hash'])) {
    hello_form(); exit;
} 

if ($_SESSION['profile_guest'] = 'guest' AND $_SESSION['profile'] !== 'user') {
    echo 'Гостевой профиль гостя ' . $_SESSION['login'];
    bem_head('Главная');
    bem_header('Мои файлы'); exit;
} 

if ($_SESSION['profile'] = 'user' AND $_SESSION['profile_guest'] = "")  {
    bem_head('Главная');
    bem_header('Мои файлы');
    echo 'Приветствуем пользователя' . $_SESSION['login'] . '!';
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
} ?>