<?php
// Сессия
include("app/database/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Font Awesome -->
    <!-- <script src="https://kit.fontawesome.com/6ab7063a64.js" crossorigin="anonymous"></script> -->
    
    <!-- googleFonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap" rel="stylesheet"> -->
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/chessboard-1.0.0.css">
    <title>Chess</title>
</head>
<body>
    <!-- HEADER -->
    <?php include("app/include/header.php"); ?>
    <!-- END HEADER -->


    <!-- MAIN -->
    <div class="container">
        <div class="row screen-1">
            <div class="main-index-text col-12">
                <h2>Приглашаем в мир удивительных шахмат</h2>
                <p>Это отличное место, чтобы повысить Ваш уровень игры и весело провести время.</p>
                <img src="img/main/main.svg" alt="" class="screen-main">
            </div> 
        </div>
    </div>

   <div class="screen-2">
        <div class="container">
            <div class="row">
                <div class="main-index-icon">
                    <h2>Почему вам понравится играть у нас?</h2>
                </div>
                <div class="col-4 index-icon">
                    <img src="img/main/iconOne.png" alt="">
                    <h3>Это бесплатно!</h3>
                    <p>Просто <a href="reg.php">создайте аккаунт</a> и начните играть — никаких подписок и платежей.</p>
                </div>
                <div class="col-4 index-icon">
                    <img src="img/main/iconTwo.png" alt="">
                    <h3>Множество режимов</h3>
                    <p>Мы создали множество режимов с уникальными механиками, в которых вы всегда испытаете что-то новое.</p>
                    <p>А классические правила были улучшены, чтобы было интереснее играть в онлайне.</p>
                </div>
                <div class="col-4 index-icon">
                    <img src="img/main/iconThree.png" alt="">
                    <h3>Соревнования</h3>
                    <p>Играйте в Соревновательном режиме, чтобы получить звание и поднимать его с каждой победой.</p>
                </div>
                
            </div>
        </div>
   </div>
    <!-- END MAIN -->




    <!-- LIBS -->
    <script src="assets/js/lib/jquery-3.6.4.js"></script>
    <script src="assets/js/lib/chessboard-1.0.0.js"></script>
    <script src="assets/js/lib/chess.js"></script>

    <!-- JS -->
    <script src="assets/js/menu.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
</body>
</html>