<?php
include "path.php";
include("app/database/db.php");

$statusMsg = '';


function userAuth($arr){
    $_SESSION['id'] = $arr['id'];
    $_SESSION['login'] = $arr['username'];
    $_SESSION['admin'] = $arr['admin'];
    if($_SESSION['admin']){
        header('location:' . BASE_URL . "admin/admin.php");
    }else{
        header('location:' . BASE_URL);
    }
}


//Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $record_puzzle = 0;
    $record_coordinate = 0;
    $last_result_puzzle = '';
    $last_result_coordinate = '';

    // $pass = password_hash($_POST['pass-first'], PASSWORD_DEFAULT); 
    // $passSec = $_POST['pass-second'];

    if($login === '' || $email === '' || $passF === ''){
        $statusMsg = "Вы не заполнили все поля!";
    }elseif (mb_strlen($login, 'UTF8') < 3) {
        $statusMsg = "Логин должен быть более двух символов";
    }elseif ($passF !== $passS){
        $statusMsg = "Пароли не совпадают";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if(!empty($existence['email']) && $existence['email'] === $email){
            $statusMsg = "Такая почта уже зарегистрирована";
        }else {
            $pass = password_hash($passF, PASSWORD_DEFAULT); 
            $post = [
                'admin' => '0',
                'username' => $login,
                'email' => $email,
                'password' => $pass,
                'record_puzzle' => $record_puzzle,
                'record_coordinate' => $record_coordinate,
                'last_result_puzzle' => $last_result_puzzle,
                'last_result_coordinate' => $last_result_coordinate,
                //'created' => '2023-03-15 18:48:14',
            ];

            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

            userAuth($user);
        }
        
    }

    // $lastRow = selectOne('users', ['id' => $id]);
}else{
    $login = '';
    $email = '';
}

// код формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    if($email === ''|| $pass === ''){
        $statusMsg = "Вы не заполнили все поля!";
    }else
    {
        $existence = selectOne('users', ['email' => $email]);
        // test($existence);
        if($existence && password_verify($pass, $existence['password'])){
            //авторизовать пользователя
            userAuth($existence);
        }else{
            //ошибка авторизации
            $statusMsg = "Ошибка Авторизации";
        }
    }
}else{
    $email = '';
}

