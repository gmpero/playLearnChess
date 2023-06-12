<?php
// Сессия
include("app/database/db.php");
$user = selectOne('users', ['id' => $_SESSION['id']]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Font Awesome -->
    <!-- <script src="https://kit.fontawesome.com/6ab7063a64.js" crossorigin="anonymous"></script> -->
    
    <!-- googleFonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap" rel="stylesheet"> -->
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <title>Chess</title>
</head>
<body>
    <!-- HEADER -->
    <?php include("app/include/header.php"); ?>
    <!-- END HEADER -->


    <!-- MAIN -->
    <div class="container">
        <div class="row">
            <div class="col-6 div-center">
                <h2 class=" profile-h3">Профиль игрока: <?php echo $_SESSION['login']; ?></h2>
                <p>Дата регистрации: <?php echo $user['created']?></p>
                <p>Почта при регистрации: <?php echo $user['email']?></p>
            </div>
            <div class="col-6 div-center">
                <h3 class=" profile-h3">Рекорды</h3>
                <p>Рекорд PuzzleStreek: <?php echo $user['record_puzzle'] ?></p>
                <p>Рекорд Coordinate: <?php echo $user['record_coordinate'] ?></p>
            </div>

            <div>
                <h3 class=" profile-h3 center-h3">Статистика за месяц</h3>
                <canvas id="myChart" class="table"></canvas>
            </div>
        </div>
    </div>

    <!--  -->
   
    <!--  -->
    <!-- END MAIN -->

   <div> <a href="logout.php">Выйти</a></div>


    <!-- График -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script src="assets/js/table.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="assets/js/menu.js"></script>
</body>
</html>