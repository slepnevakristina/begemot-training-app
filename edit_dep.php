<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
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
        $depart_id=$_GET['id'];
        $query = "SELECT * FROM `departament` WHERE `id_dep`='$depart_id'";
        mysqli_query($db,  $query) or die(mysqli_error($db)); 
        $departament=mysqli_query($db, $query);
        $departament=mysqli_fetch_assoc($departament);

        if (!empty($_POST)) {
            $id=$_POST['id'];
            $name = $_POST['name'];
            $query = "UPDATE `departament` SET `name` = '$name' WHERE `departament`.`id_dep` = '$id'"; 
            mysqli_query($db,  $query) or die(mysqli_error($db)); 
            header('Location: departament.php');
        }

    ?>
    <form method="post" action="edit_dep.php">
            <input type="hidden" name="id" value="<?=$departament['id_dep']?>">
            <label>Название <input type="text" name="name"  value="<?=$departament['name']?>" required></label><br>
            <button type="submit" class="btn btn-outline-danger">Сохранить</button>
        </form>  
    </div>
</div>

</body>
</html>