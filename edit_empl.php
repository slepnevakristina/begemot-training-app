<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<header>
        <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
            <a class="navbar-brand" href="employees.php">
                <img src="logotip.png" width="150px" alt="" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="employees.php">Сотрудники<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="departament.php">Отделы</a>
                    <a class="nav-item nav-link" href="emp_dep.php">Сотрудник-отдел</a>
                    <a class="nav-link" href="provider.php">Поставщики</a>
                    <a class="nav-link" href="waybill.php">Накладные</a>
                </div>
            </div>
            </nav>
        </div>
</header>

<div id="content">
    <div class="container-fluid">
    
    <?php
        require_once 'connect.php';
        $employ_id=$_GET['id'];
        $query = "SELECT * FROM `employees` WHERE `id_empl`='$employ_id'";
        mysqli_query($db,  $query) or die(mysqli_error($db)); 
        $employ=mysqli_query($db, $query);
        $employ=mysqli_fetch_assoc($employ);

        if (!empty($_POST)) {
            $id=$_POST['id'];
            $surname = $_POST['surname'];
            $name = $_POST['name'];
            $fathername = $_POST['fathername'];
            $birthday = $_POST['birthday'];
            $position = $_POST['position'];
            $query = "UPDATE `employees` SET `surname` = '$surname', `name` = '$name', `fathername` = '$fathername', `birthday` = '$birthday', `position` = '$position' WHERE `employees`.`id_empl` = '$id'"; 
            mysqli_query($db,  $query) or die(mysqli_error($db)); 
            header('Location: employees.php');
        }

    ?>
    <form method="post" action="edit_empl.php">
            <input type="hidden" name="id" value="<?=$employ['id_empl']?>">
            <label>Фамилия <input type="text" name="surname" value="<?=$employ['surname']?>" required></label>
            <label>Имя <input type="text" name="name"  value="<?=$employ['name']?>" required></label>
            <label>Отчество <input type="text" name="fathername"  value="<?=$employ['fathername']?>" required></label><br>
            <label>Дата рождения <input type="date" name="birthday"  value="<?=$employ['birthday']?>" required></label><br>
            <label>Должность <input type="text" name="position"  value="<?=$employ['position']?>" required></label><br>
            <button type="submit" class="btn btn-outline-danger">Сохранить</button>
        </form>  
    </div>
</div>

</body>
</html>