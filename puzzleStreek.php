<?php
// Сессия
include("app/database/db.php");

// include("getRecordPuzzle.php");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>puzzleStreak</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- STYLE -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/puzzle.css">
  <link rel="stylesheet" href="assets/css/chessboard-1.0.0.css">
  <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>

<!-- header -->
<?php include("app/include/header.php"); ?>
<!-- END HEADER -->


<!-- MAIN -->
<div class="container">
    <div class="row">
        <div class="desc col-6">
            <div id="board" style="width: 86%" class="board"></div>
        </div>
        <div class="col-6">
            <div class="infopuzzle-1">
                <div class="rules">
                    <p>Решайте постепенно усложняющиеся головоломки и выстраивайте победную серию. </p>
                    <p>Здесь нет часов, так что не торопитесь. Одно неверное движение, и игра окончена!</p>
                </div>
            </div>
            <div class="infopuzzle-2">
                <div class="rating">Рейтинг задачи: <strong id="rating" class="ratingNumber"></strong></div>
                <div class="textCount">Решено задач подряд:</div>
                <div class="numberOfCounter" id="countPuzzleStreek">0</div>
                <div class="warning" id="warning"></div>
            </div>
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
<!-- <script src="js/scripts/logicsPuzzle.js"></script> -->
<script src="assets/js/logicsPuzzle.js"></script>


<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="assets/js/menu.js"></script>

</body>
</html>
