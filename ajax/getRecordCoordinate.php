<?php

require_once "../app/database/db.php";

if(isset($_POST['data']) && isset($_SESSION['id']))
{
    $param_user = [
        'id' => $_SESSION['id']
    ];
    $lastRecord = selectOne('users', $param_user);

    $data = $_POST['data'];
    if($data > $lastRecord['record_coordinate'])
    {
        $param = [
            'record_coordinate' => $data,
        ];
        $id = $_SESSION['id'];
        update('users', $id, $param);
    }
    $param_games = [
        'id' => $_SESSION['id'],
        'max_count_coordinate' => $data,
    ];
    insert('games_coordinate', $param_games);
}


// $data = $_POST['data'];
// echo $data;
 
// $dt = json_decode($data);