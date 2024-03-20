<?php include "../components/core.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Page</title>
    <link rel="stylesheet" href="../css/background_subpage.css">
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
<div class='wrapper'>
<div class='body'>
    <div class="main_menu">
        <nav class="menu">
            <a href="../index.php" class="name"><div class="logo_name">
                <img class="logo" src="../img/logo.png" alt="">
                <div>Star Rail</div>
            </div></a>
            <div class="dropdown menu_item">
                <p>База знаний</p>
                <div class="dropdown-content">
                    <a class="menu_item" href="characters.php">Персонажи</a>
                    <!-- <a class="menu_item" href="">Характеристики</a> -->
                    <a class="menu_item" href="lightcones.php">Световые конусы</a>
                    <!-- <a class="menu_item" href="">Реликвии</a> -->
                    <!-- <a class="menu_item" href="">Бой</a> -->
                </div>
            </div>
            <a class="menu_item" href="universe.php">Виртуальная вселенная</a>
            <!-- Выпадающее меню 2 
            <div class="dropdown menu_item">
                <p>Хай-энд контент</p>
                <div class="dropdown-content">
                    <a class="menu_item" href="universe.php">Виртуальная вселенная</a>
                    <a class="menu_item" href="">Зал забвения</a>
                </div>
            </div>
            <a class="menu_item" href="">Поиск</a> -->
            <?php
            if (!isset($_SESSION['user']) || $_SESSION['user']=="") {
                echo "<a class='menu_item' href='registration.php'>Регистрация</a>";
                echo "<a class='menu_item' href='authorization.php'>Авторизация</a>";
            }
            else if ($_SESSION['user']=="admin") {
                    echo "<a class='menu_item' href='admin.php'>Admin</a>";
                    echo "<a class='menu_item' href='../components/exit.php'>Выход</a>";
                }
                else {
                echo "<a class='menu_item' href='achivment.php'><p>Ачивки: {$_SESSION['user']}</p></a>";
                echo "<a class='menu_item' href='../components/exit.php'>Выход</a>";
            }
            ?>
        </nav>
    </div>