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
            $username=$_POST['username'];
            $password=$_POST['password'];
            $query="SELECT* FROM users WHERE username='$username' and password='$password'";
            $result=mysqli_query($db, $query) or die(msqli_error($db));
            $count=mysqli_num_rows($result);
            if($count==1){
                $user=mysqli_fetch_assoc($result);
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "fullname" => $user['fullname'],
                    "username" => $user['username'],
                    "email" => $user['email']
                ];
                header('Location: employees.php');
            }
            else {
                $fmsg="Ошибка";
            }
        } 
    ?>
    <div class="content">
        <form class="form-signing" method="POST" style="display: flex; flex-direction: column; width: 400px;">
            <img src="logotip.png" width="250px" style="margin-bottom: 30px;">
            <h2 style="text-align: center;">Вход</h2> 
            <label>Логин</label>
            <input type="text" name="username"class="form-control" placeholder="Введите свой логин" required>
            <label>Пароль</label>
            <input type="password" name="password"class="form-control" placeholder="Введите пароль" required>
            <button class="btn btn-lg btn-danger btn-block" type="submit" style="margin-top: 20px!important; margin-bottom: 10px!important; ">Войти</button>
            <p>Если у Вас еще нет аккаунта - <a href="reg.php" style="color: #f02929; font-weight: bold;">зарегистрируйтесь</a>
        </form>
    </div>
    
</body>
</html>