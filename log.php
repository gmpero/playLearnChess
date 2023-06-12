<?php 
// include("path.php");
include("app/controllers/users.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- Custom style -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Rubik:wght@400;700&family=Tinos:wght@400;700&display=swap" rel="stylesheet">
    <title>Etude blog</title>
  </head>
  <body>
	<!-- header -->
    <?php include("app/include/header.php"); ?>
    <!-- END HEADER -->

    <!-- FORM -->
    <div class="container reg_form">
        <form class="row justify-content-center" method="post" action="">
            <h2>Форма Авторизации</h2>
            <div class="col-12 col-md-4 mb-3 error">
                <p><?=$statusMsg?></p>
            </div>
            <div class="min-vw-100"></div>
            <div class="form-group col-12 col-md-4 mb-3">
                <label for="formGroupExampleInput">Ваша почта</label>
                <input name ="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="min-vw-100"></div>
            <div class="form-group col-12 col-md-4 mb-3">
              <label for="exampleInputPassword1">Пароль</label>
              <input name ="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="min-vw-100"></div>
            <div class="col-6 col-md-4 mb-3">
                <button type="submit" class="btn btn-secondary" name="button-log">Войти</button>
                <a href="reg.php">Регистрация</a>
            </div>
          </form>
    </div>
    <!-- END FORM -->
    
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </body>
</html>
