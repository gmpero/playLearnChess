<?php

session_start();

require('connect.php');

function test($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

// Проверка выполнения запроса к БД
function dbCheckEror($query){
    $erorInfo = $query->errorInfo();

    if ($erorInfo[0] !== PDO::ERR_NONE) {
        echo $erorInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных с одной таблицы
function selectALL($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();  
   
    dbCheckEror($query);

    return $query->fetchAll(); 
}


// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    // $sql = $sql . " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query->execute();  
   
    dbCheckEror($query);

    return $query->fetch(); 
}


// $params = [
//     'admin' => 1,
//     'username' => 'Klim',
// ];

// test(selectOne('users'));

// test(selectALL('users', $params));

// Запись в таблицу БД
function insert($table, $params){
    global $pdo;
    $i = 0;
    $col = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if($i === 0){
            $col = $col . "$key";
            $mask = $mask . "'". "$value" . "'";
            $i++;
        }else{
            $col = $col . ", $key";
            $mask = $mask . ", '". $value . "'";
        }
        $i++;
    }

    // INSERT INTO 'users' (admin, usernane, email, password) VALUES ('1', '44', 'Threе@mail.ru', '333');
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";

    // test($sql);
    // exit();

    $query = $pdo->prepare($sql);
    $query->execute();  
    dbCheckEror($query);

    return $pdo->lastInsertId();
}


// $arrData = [
//     'admin' => '0',
//     'username' => '12125',
//     'email' => 'r1112@rfe.ru',
//     'password' => 'jfkdjfk12kjkjdf',
//     'created' => '2023-03-15 18:48:14',
// ];


// Редактирование записи (обновление строки в таблице)
function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";

    // test($sql);
    // exit();

    $query = $pdo->prepare($sql);
    $query->execute();  
    dbCheckEror($query);
}

// $param = [
//     'admin' => '0',
//     // 'password' => '353',
//     // 'email' => 'testUpdate@mail.com'
// ];

// update('users', 5, $param);

// Функция удаления записи из БД
function delete($table, $id){
    global $pdo;
    
    $sql = "DELETE FROM $table WHERE id = $id";

    // test($sql);
    // exit();

    $query = $pdo->prepare($sql);
    $query->execute();  
    dbCheckEror($query);
}

//delete('users', 5);