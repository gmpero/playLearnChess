<?php
require('../app/database/db.php');
function getTable()
{
    $id = $_SESSION['id'];
    $arr = selectOne('users', ['id'=>$id]);
    $tableDataString = $arr['last_result_coordinate'];
    $tableDataArr = explode(' ', $tableDataString);
    return $tableDataArr;
}

$result = json_encode(getTable());


echo $result;