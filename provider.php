<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Бегемот-поставщики</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
        <a class="navbar-brand" href="employees.php">
            <img src="logotip.png" width="150px" alt="" loading="lazy">
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="employees.php">Сотрудники</a>
                <a class="nav-item nav-link" href="departament.php">Отделы</a>
                <a class="nav-item nav-link" href="emp_dep.php">Сотрудник-отдел</a>
                <a class="nav-item nav-link" href="provider.php">Поставщики</a>
                <a class="nav-item nav-link" href="waybill.php">Накладные</a>
            </div>
        </div>
        </nav>
    </div>
</header>
<div class="container-fluid">
    <table class="table table-bordered table-sm " style="width: 60%;">
        <tr class="table-danger">
            <th>ID</th>
            <th>Назввание</th>
            <th>ID отдела</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
            require_once 'connect.php';
            //удаление
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $query = "DELETE FROM `provider`  WHERE `provider`.`id_prov` = '$id'"; 
                mysqli_query($db,  $query) or die(mysqli_error($db)); 
            }
            //получение всех сотрудников
            $query ="SELECT * FROM `provider`";
            $results=mysqli_query($db, $query);
            $results=mysqli_fetch_all($results);
            // Вывод на экран:
            $result = '';
            foreach($results as $prov){
            $result .= '<tr>';
                $result .= '<td>' . $prov[0] . '</td>';
                $result .= '<td>' . $prov[1] . '</td>';
                $result .= '<td>' . $prov[2] . '</td>'; 
                $result .= '<td><a href="edit_prov.php?id='. $prov[0] .'">изменить</a></td>';
                $result .= '<td><a href="?id='. $prov[0] .'">удалить</a></td>';   
            $result .= '</tr>';
            }
            echo $result;
        ?>

    </table>
    <a href="add_prov.php"><button type='submit' class="btn btn-outline-danger">Добавить запись</button></a>
</div>
</body>
</html>