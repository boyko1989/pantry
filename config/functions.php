<?php

function work_banner() {
    echo '<!DOCTYPE html>
    <html lang="ru">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
        <style>
            * {
                padding: 0;
                margin: 0;
                font-family: \'Merriweather\', serif;
    
            }
    
            body {
                background-color: rgb(255, 254, 254);
            }
    
            .content {
                max-width: 500px;
                margin: 20vh auto;
                background-color: rgb(244, 255, 255);
                padding: 40px;
                border: gray solid 1px;
            }
    
            h1 {
                color: blue;
                text-align: center;
                padding-bottom: 40px;
            }
        </style>
        <title>Ведутся работы</title>
    </head>
    
    <body>
        <div class="content">
            <h1>Ведутся работы по созданию удобного облачного хранилища</h1>
    
            <p>Если вы видите эту страницу, значит мы ещё не достигли цели по созданию файлового хранилища. В наших планах
                создать удобную "кладовку" как для временного (один - два дня), так и для длительного и надёжного хранения
                ваших
                файлов, предназначенных как для группы людей так и для личного пользования.</p>
            <p>Для начала построим "забор" - систему авторизации и регистрации.</p>
        </div>
    </body>
    
    </html>';
}

function hello_form () {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
        <style>
            * {
                padding: 0;
                margin: 0;
                font-family: \'Merriweather\', serif;
            }
            body {
                width: 100vw;
                height: 100vh;
                background-image: url(https://raw.githubusercontent.com/boyko1989/pic/master/startbg.jpg);
                background-size: 100%;
                box-shadow: 0 0 60px 60px #fff inset;
                position: relative;                
            }
            
            .container {
                /*width: 80vw;*/
                position: absolute;
                top: calc(50% - 200px);
                right: calc(50% - 140px);
                display: flex;
                flex-direction: column;
                margin: auto;/*
                flex-wrap: wrap;*/
                justify-content: center;
                align-items: center;
                text-align: center;
                background-color: #fff;
                border-radius: 20px;
                box-shadow: 0 0 10px 10px #fff;
                
            }
            h1 {
                margin: 15px;
                font-size: 50px;
            }

            a,
            a:visited {
                text-decoration: none;               
                list-style-type: none;
                color: #fff;                
            }

            li{
                padding: 15px;
                margin: 12px;
                background-color: rgb(223, 202, 175);
                box-shadow: 0 0 3px 3px rgb(223, 202, 175);
                border-radius: 12px;
            }
            li:hover {
                opacity: 0.32;
                color: #000; 
            }
            main {
                margin: 40px;
            }
        </style>
        <title>Приветствуем!</title>
    </head>
<body>
    <div class="container">
        <header>
            <h1>Pantry</h1>
        </header>
        <main>
            <div class="buttons">
                <ul>
                    <a href="small_reg.php"><li class="menu">Начать</li></a>
                    <a href="login.php"><li class="menu">Войти</li></a>
                    <a href="register.php"><li class="menu">Зарегистрироваться</li></a>
                </ul>
            </div>
        </main>
    </div>      
</body>
</html>';
}

function bem_head($title) {
echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>'.$title.'</title>
    </head>';
}

function bem_header($h1) {
    echo ' <body>
	<header>
        <h1>'.$h1.'</h1>';
		//search();
		echo '<a href="logout.php"><li class="menu">Выйти</li></a>       
    </header>';
}

function menu1() {
	echo '<ul>
		<a href="#">
			<li class="menu">Фото</li>
		</a>
		<a href="#">
			<li class="menu">Фильмы</li>
		</a>
		<a href="#">
			<li class="menu">Музыка</li>
		</a>
		<a href="#">
			<li class="menu">Курсы</li>
		</a>
		<a href="#">
			<li class="menu">Программы</li>
		</a>
		<a href="#">
			<li class="menu">3D-модели</li>
		</a>
		<a href="#">
			<li class="menu">Документы</li>
		</a>';		
}

function menu2() {
	echo '<hr color="black" noshade size="1px">
        
    <ul>
        <a href="admin/reports.php">
            <li class="menu">Системы</li>
        </a>
        <a href="files/01 - Видеофайлы/3 - Для души/Фильмы/">
            <li class="menu">Проекты</li>
        </a>
        <a href="files/03 - Аудио/Музыка/">
            <li class="menu">Планирование</li>
        </a>
        <a href="files/00 - Курсы/">
            <li class="menu">Резервные копии</li>
        </a>                 
    </ul>';		
}

function listing() {
    echo '<ul class="listing">

    <a class="list" href="content/planning.php">
        <li>Организация и планирование</li>
    </a>

    <a class="list" href="content/cooking.php">
        <li>Кулинария</li>
    </a>

    <a class="list" href="content/handiwork.php">
        <li>Рукоделие</li>
    </a>

    <a class="list" href="content/compscience.php">
        <li>Компьютерные науки</li>
    </a>

    <a class="list" href="content/languages.php">
        <li>Языки</li>
    </a>

    <a class="list" href="content/building.php">
        <li>Строительство</li>
    </a>

    <a class="list" href="content/joinery.php">
        <li>Столярно-мебельное дело</li>
    </a>

    <a class="list" href="content/psychology.php">
        <li>Психология</li>
    </a>

    <a class="list" href="content/economy.php">
        <li>Экономика</li>
    </a>

    <a class="list" href="content/design.php">
        <li>Дизайн интерьеров</li>
    </a>

    <a class="list" href="content/design.php">
        <li>Список имущества</li>
    </a>
</ul>';
}

function footer() {
	echo '<footer class="footer"><br>
		<a href="/">На главную</a>
		<a href="javascript:history.go(-1)">/ На предыдущую</a><br>';

		$bytes = disk_free_space(".");
		$gigabytes = $bytes/1024*1024*1024;
	echo 'Свободного места на диске: '. $bytes . 'байт';
	echo '</footer>'; 
}

?>