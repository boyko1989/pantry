<?php 
require_once '../config/functions.php';
    
    bem_head('Главная');
    bem_header('Мои файлы')
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
?>