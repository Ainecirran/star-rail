<?php include "components/core.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="css/back_main.css">
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <!-- разделение для футера??? -->
    <div class='wrapper'>
        <div class='body'>

            <!-- Видео на фоне -->
            <div class="overlay">
                <video class="video" loop autoplay muted>
                    <source src="img/Loading_Screen.mp4" type="video/mp4">
                </video>
            </div>

            <!-- xеадер -->
            <header>
                <div class="main_menu">
                    <nav class="menu">
                        <a href="">
                            <div class="logo_name">
                                <div class="logo"><img src="img/logo.png" alt=""></div>
                                <div class="name">Star Rail</div>
                            </div>
                        </a>
                        <!-- Выпадающее меню 1 -->
                        <div class="dropdown menu_item">
                            <p>База знаний</p>
                            <div class="dropdown-content">
                                <a class="menu_item" href="pages/characters.php">Персонажи</a>
                                <!-- <a class="menu_item" href="">Характеристики</a> -->
                                <a class="menu_item" href="pages/lightcones.php">Световые конусы</a>
                                <!-- <a class="menu_item" href="">Реликвии</a> -->
                                <!-- <a class="menu_item" href="">Бой</a> -->
                            </div>
                        </div>
                        <a class="menu_item" href="pages/universe.php">Виртуальная вселенная</a>
                        <!-- Выпадающее меню 2
                <div class="dropdown menu_item">
                    <p>Хай-энд контент</p>
                    <div class="dropdown-content">
                        <a class="menu_item" href="pages/universe.php">Виртуальная вселенная</a>
                        <a class="menu_item" href="">Зал забвения</a>
                    </div>
                </div>
                        <a class="menu_item" href="">Поиск</a> -->
                        <?php
                        if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
                            echo "<a class='menu_item' href='pages/registration.php'>Регистрация</a>";
                            echo "<a class='menu_item' href='pages/authorization.php'>Авторизация</a>";
                        } else if ($_SESSION['user'] == "admin") {
                            echo "<a class='menu_item' href='pages/admin.php'>Admin</a>";
                            echo "<a class='menu_item' href='components/exit.php'>Выход</a>";
                        } else {
                            echo "<a class='menu_item' href='pages/achivment.php'><p>Ачивки: {$_SESSION['user']}</p></a>";
                            echo "<a class='menu_item' href='components/exit.php'>Выход</a>";
                        }
                        ?>
                    </nav>
                </div>
            </header>

            <!-- вывод ошибок и кнопка(потом для истории и т.д.) -->
            <?php
            if (isset($_SESSION['error'])) {
                if ($_SESSION['error'] != "") {
                    echo "<div class='error_message'><p>{$_SESSION['error']}</p></div>";
                    unset($_SESSION['error']);
                }
            }
            ?>

            <!-- выпадающие окно по нажатию кнопки
            <button id="btn-toggle">Показать краткий функционал сайта</button>
            <div id="sait_content">
                <div class="img_menu">
                    <img src="img/2.jpg" alt="">
                </div>
            </div>
            -->
            <!-- новости -->
            <h1>Новости</h1>
            <div class="content">
                <?php
                $result = $connect->query("SELECT * FROM `news_card`");
                while ($res = mysqli_fetch_array($result)) {
                    echo "<div class='card'><a href='pages/{$res['href']}'>";
                    echo "<div class='img_card'> <img src='img/{$res['img']}' alt=''> </div><hr>";
                    echo "<p class='short_description'>{$res['short_desc']}</p>";
                    echo "</div></a>";
                }
                ?>
            </div>
        </div>


        <div class="end"></div>
        <!-- футер? -->
        <footer>
            <div class='info_for_user'>
                <h1>Ссылки</h1>
                <p><a href='https://hsr.hoyoverse.com'>Оффициальный сайт разработчика</a></p>
                <p><a href='https://hsr.hoyoverse.com'>Оффициальная страница игры</a></p>
                <p><a href='https://hsr.hoyoverse.com'>че-нить еще</a></p>
                <p><a href='https://www.youtube.com/channel/UC2PeMPA8PAOp-bynLoCeMLA'>Youtube</a></p>
            </div>
            <?php
            if (isset($_SESSION['user']) && ($_SESSION['user'] != "")) {
                echo "
        <div class='comment'>
            <h1>Оставить комментарий</h1> 
            <form action='components/comment.php' method='post'>
                <input type='hidden' name='login' value='{$_SESSION['user']}'>
                <input type='textarea' name='comment' placeholder='коммент'>
                <input type='submit' class='submit' value='Отправить'>
            </form>
        </div>
        </footer>";
            }
            ?>
        </footer>
    </div>
    <script src="js/js.js"></script>
</body>
</html>