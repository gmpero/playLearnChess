<?php
// Сессия
include("app/database/db.php");

// include "getRecordCoordinate.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/coordinate.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <title>coordinate</title>
</head>
<body>
    <!-- HEADER -->
    <?php include("app/include/header.php"); ?>
    <!-- END HEADER -->

    <!-- MAIN -->
    <div class="container">
        <div class="row">
            <div class="desc col-6">
                
            </div>
            <div class="col-6">
                <div class="text_coord">
                    <p> Знание координат на шахматной доске — очень важный навык для шахматиста:</p>
                    <ul>
                        <li>В большинстве шахматных курсов и упражнений широко используется шахматная нотация.</li>
                        <li>Вам будет проще общаться с другом-шахматистом, если вы оба будете понимать «язык шахмат».</li>
                        <li>Анализировать игры гораздо проще, когда не тратится время на поиск полей по их координатам.</li>
                    </ul>
                    <h3>Найти поле</h3>
                    <p>Координаты появляются на доске, и вам нужно отметить соответствующее им поле.</p>
                    <p>У вас есть 30 секунд на то, чтобы правильно отметить как можно больше полей!</p>
                </div>
                <div class="wrapper">
                    <button type="button" class="btn btn-primary">Начать</button>
                </div>
                <div class="resP"></div>
                <div class="coord" id="result"></div>
                <div class="count" id="count"></div>
                <div id="timer"></div>
            </div>
        </div>
    </div>
    <!-- END MAIN -->

    <!-- JS -->
    <script type="text/javascript" src="assets/js/coordinate.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="assets/js/menu.js"></script>
</body>
</html>