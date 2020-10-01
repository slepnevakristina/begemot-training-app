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
        $bill_id=$_GET['id'];
        $query = "SELECT * FROM `waybill` WHERE `id_bill`='$bill_id'";
        mysqli_query($db,  $query) or die(mysqli_error($db)); 
        $waybill=mysqli_query($db, $query);
        $waybill=mysqli_fetch_assoc($waybill);

        if (!empty($_POST)) {
            $id=$_POST['id'];
            $date_bill = $_POST['date_bill'];
            $number = $_POST['number'];
            $n_prov = $_POST['n_prov'];
            $status = $_POST['status'];
            $query = "UPDATE `waybill` SET date_bill='$date_bill', number='$number', n_prov='$n_prov',  status='$status' WHERE `waybill`.`id_bill` = '$id'"; 
            mysqli_query($db,  $query) or die(mysqli_error($db)); 
            header('Location: waybill.php');
        }

    ?>
    <form method="post" action="edit_w.php">
            <input type="hidden" name="id" value="<?=$waybill['id_bill']?>">
            <label>Дата <input type="date" name="date_bill" value="<?=$waybill['date_bill']?>" required></label>
            <label>Номер <input type="text" name="number"  value="<?=$waybill['number']?>" required></label>
            <label>ID поставщика <input type="text" name="n_prov"  value="<?=$waybill['n_prov']?>" required></label><br>
            <label>Статус <input type="text" name="status"  value="<?=$waybill['status']?>" required></label><br>
            <button type="submit" class="btn btn-outline-danger">Сохранить</button>
        </form>  
    </div>
</div>

</body>
</html>