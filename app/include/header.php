<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>PlayLearnChess</h1>
            </div>
            <nav class="col-8 menu">
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="coordinate.php">Координаты</a></li>
                    <li><a href="puzzleStreek.php">Puzzle Streek</a></li>
                    <li>
                        <?php if (isset($_SESSION["id"])):?>
                            <a href="profile.php"><strong class="username"><?php echo $_SESSION['login'];?></strong></a>
                        <?php else:?>
                            <a href="log.php">Войти</a>
                        <?php endif; ?>
                    </li>   
                </ul>
            </nav>
        </div>
    </div>
</header>