<?php

require('../app/database/db.php');
function getTable()
{
    $id = $_SESSION['id'];
    $arr = selectOne('users', ['id'=>$id]);
    $tableDataString = $arr['last_result_puzzle'];
    $tableDataArr = explode(' ', $tableDataString);
    return $tableDataArr;
}

$result = json_encode(getTable());


echo $result;
// print_r($tableDataArr);

