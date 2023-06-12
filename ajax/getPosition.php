<?php

// В данном файле логика получения позиции FEN из БД
include "../app/database/db.php";

// if(isset($_POST['data']))

    // $id = $_POST['id'];
$id = 0;
$randNum = rand(1, 20);
$id = $id + $randNum;
$_SESSION['idPuzzle'] += $id;
// $_SESSION['idPuzzle'] = 1;
$params = [
    'PuzzleId' => $_SESSION['idPuzzle']
];
    
$result = selectOne('puzzle', $params);
    


$result = json_encode($result);

echo $result;






