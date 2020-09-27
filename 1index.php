<?php 
require_once 'functions/function.php';
had0('Главная');
?>
<body>
    <header>
        <h1>Мои файлы</h1>    
        <?php search() ?>
        <a href="login.php"><li class="menu">Выйти</li></a>       
    </header>
        
<main>
<div class="doubleline"> 
            <hr color="black" noshade size="2px">           
        </div>
<div class="con_menu">
    <?php menu() ?> 
        <hr color="black" noshade size="1px">
        
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
            </ul>
            </div>
    <div class="doubleline3"></div>
    
    <ul class="listing">

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
    </ul>
    <div class="doubleline"> 
        <hr color="black" noshade size="2px">           
    </div>
</main>
      
</body>

</html>
<?php footer() ?>