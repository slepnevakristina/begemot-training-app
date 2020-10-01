<?php 
    //подключение к бд
    $db = mysqli_connect('localhost', 'root', '', 'begemot');    
    if (!$db) {
        die("Невозможно подключиться к базе данных.");
    }
?>