<?php

require_once "../app/database/db.php";

$_SESSION['idPuzzle'] = 0;

if(isset($_POST['data']) && isset($_SESSION['id']))
{
    $param_user = [
        'id' => $_SESSION['id']
    ];
    $lastRecord = selectOne('users', $param_user);

    $data = $_POST['data'];
    if($data > $lastRecord['record_puzzle'])
    {
        $param = [
            'record_puzzle' => $data,
        ];
        $id = $_SESSION['id'];
        update('users', $id, $param);
    }

    $lastlevel_id = $_POST['data1'];
    $param_games = [
        'id' => $_SESSION['id'],
        'max_level' => $data,
        'last_level_id' => $lastlevel_id,
    ];
    insert('games_puzzle', $param_games);
}


// $data = $_POST['data'];
// echo $data;
 
// $dt = json_decode($data);