<?php session_start();
require_once '../config/functions.php' ?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
        <style>
            * {
                padding: 0;
                margin: 0;
                font-family: 'Merriweather', serif;
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
                <h1>Вход</h1>
            </header>
            <main>
            <form class="form" action="enter.php" method="post">		

                    <label>Логин</label><br><br>
                    <input type="text" name="login" required><br><br>
                    
                    <label>Пароль</label><br><br>
                    <input type="password" name="password" required><br><br>

                    <input type="submit" value="Вход"><br><br>
                        <?php if(isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                        }?>
                </form>               
            </main>
        </div>      
    </body>
</html>