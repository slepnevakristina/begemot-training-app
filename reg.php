<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
<body style="height: 100vh; display: flex; align-items: center; justify-content: center;">

<?php
    session_start();
    require_once 'connect.php';
    if(isset($_POST['username']) && isset($_POST['password'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        if($password === $password_confirm){
            $query="INSERT INTO `users`(`fullname`, `username`, `email`, `password`) VALUES ('$fullname', '$username', '$email', '$password')";
            $result=mysqli_query($db, $query);
            if($result){
                $smsg="Вы успешно зарегестрированы";
            }
            else{
                $fmsg="Регистрация не удалась";
            }
        }else{
            $fmsg="Пароли не совпадают";
        }
        
    }
?>
<div class="content">  
    <form class="form-signing" method="POST" style="display: flex; flex-direction: column; width: 400px;">
        <img src="logotip.png" width="250px" style="margin-bottom: 30px;">
        <h2 style="text-align: center;">Регистрация</h2>
        <?php if(isset($smsg)){ 
            echo "<div class='alert alert-success' role='alert'>". $smsg. "</div>";
        }
        ?>
        <?php if(isset($fmsg)){ 
            echo "<div class='alert alert-danger' role='alert'>". $fmsg. "</div>";
        }
        ?>
        <label>ФИО</label>
        <input type="text" name="fullname" class="form-control" placeholder="Введите свое ФИО полностью" required>
        <label>Логин</label>
        <input type="text" name="username"class="form-control" placeholder="Введите свой логин" required>
        <label>Почта</label>
        <input type="email" name="email"class="form-control" placeholder="Введите адрес своей электронной почты " required>
        <label>Пароль</label>
        <input type="password" name="password"class="form-control" placeholder="Введите пароль" required>
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm"class="form-control" placeholder="Введите пароль" required>
        
        <button class="btn btn-lg btn-danger btn-block" type="submit" style="margin-top: 20px!important; margin-bottom: 10px!important; ">Зарегистрироваться</button>
        <p>Если у Вас уже есть аккаунт - <a href="login.php" style="color: #f02929; font-weight: bold;">авторизуйтесь</a>
        
    </form>    
</div>
</body>
</html>