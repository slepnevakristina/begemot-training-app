<?php
    session_start();
    require_once 'connect.php';
    // print_r($_POST);
    if(isset($_POST['fullname'])&& isset($_POST['username'])&& isset($_POST['email']) && isset($_POST['password'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        
        if ($password == $password_confirm) {
            
            $query="INSERT INTO `users`(`fullname`, `username`, `email`, `password`) VALUES ('$fullname', '$username', '$email', '$password')";
            $result=mysqli_query($db, $query);

            if($result){
                $smsg="Вы успешно зарегестрированы";
            }
            else{
                $fmsg="Регистрация не удалась";
            }
        }else {
            $fmsg = 'Пароли не совпадают';
            header('reg.php');
        }
     }
?>