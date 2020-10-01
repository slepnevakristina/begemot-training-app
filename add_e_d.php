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
        if (!empty($_POST)) {
            $num_emp = $_POST['num_emp'];
            $num_dep = $_POST['num_dep'];
            $query = "INSERT INTO emp_dep SET num_emp='$num_emp', num_dep='$num_dep'"; 
            mysqli_query($db,  $query) or die(mysqli_error($db)); 
            header('Location: emp_dep.php');
        }  
        ?>
        <form method="post" action="add_e_d.php">
            <label>ID сотрудника<input type="text" name="num_emp" required></label>
            <label>ID отдела<input type="text" name="num_dep" required></label><br>
            <button type="submit"  class="btn btn-outline-danger">Добавить</button>
        </form>
        </table>
    </div>
</div>

</body>
</html>