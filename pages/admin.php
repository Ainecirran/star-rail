<?php
include_once "../components/header.php";

if (!(isset($_SESSION['user'])) || ($_SESSION['user']!="admin")) {
    header("Location: ../index.php");
}

if (isset($_SESSION['error'])) {
    if ($_SESSION['error']!="") {
    echo "<div class='error_message'><p>{$_SESSION['error']}</p></div>";
    unset($_SESSION['error']);
    }
}
?>
<!-- новости -->
<style>
    body {
        background-color: black;
        background-image: none;
    }
</style>
<h1>news</h1>
<div class="content_admin">
    <?php
        $result = $connect -> query("SELECT * FROM `news_card`");
        $i = 1;
        while ($res = mysqli_fetch_array($result)) {
            echo "<div class='card_admin'>";
            echo "<div class='img_card'> $i <img src='../img/{$res['img']}' alt=''> </div><br>";
            echo "<p class='short_description'>{$res['short_desc']}</p>";
            echo "</div>";
            $i++;
        }
    ?>
</div>
<h3>какую новость изменить?</h3>
<form action='news_ref.php' method='post'>
    <input type='text' name='id' placeholder='(1-6)'>
    <input type='submit' class='submit' name='button' value='изменить'>
</form>

<h3>заменить новость?</h3>
<form action='../components/news_refresh.php' method='post'>
    <input type='text' name='id_old' placeholder='id той, что заменяется'>
    <input type='text' name='id_new' placeholder='id той, с которой возьмется инфа'>
    <input type='submit' class='submit' name='button' value='заменить'>
</form>

<!-- персы -->
<hr><br><hr><h1>Персонажи</h1>
<h3>добавить персонажа?</h3>
<form action='../components/addCharacter.php' method='post' enctype="multipart/form-data">
    <input type='text' name='name' placeholder='имя'>
    <input type='text' name='rare' placeholder='раритетность(4-5)'>
    <label for="img">Картинка перса</label><input type='file' name='img'>
    <input type='text' name='element_id' placeholder='элемент(1-Phis,2-Ice,3-Fire,4-Light,5-Wind,6-Quant,7-Imagine)'>
    <input type='text' name='path' placeholder='путь'>
    <label for="img_path">Картинка пути</label><input type='file' name='img_path'>
    <label for="img_list">Картинка перса в таблице</label><input type='file' name='img_list'>
    <input type='submit' class='submit' name='button' value='добавить'>
</form>

<!-- дописать полное добавление, в целом не сложно, но ...
<h3>+ статы перса</h3>
<form action='../components/add_stats.php' method='post' enctype="multipart/form-data">
    <input type='text' name='name' placeholder='имя'>
    <input type='text' name='rare' placeholder='раритетность(4-5)'>
    <label for="img">Картинка перса</label><input type='file' name='img'>
    <input type='text' name='element_id' placeholder='элемент(1-Phis,2-Ice,3-Fire,4-Light,5-Wind,6-Quant,7-Imagine)'>
    <input type='text' name='path' placeholder='путь'>
    <label for="img_path">Картинка пути</label><input type='file' name='img_path'>
    <label for="img_list">Картинка перса в таблице</label><input type='file' name='img_list'>
    <input type='submit' class='submit' name='button' value='добавить'>
</form>

<h3>далее описание, скилы и абилки со следов перса</h3>
<form action='../components/add_talants.php' method='post' enctype="multipart/form-data">
    <input type='text' name='name' placeholder='имя'>
    <input type='text' name='rare' placeholder='раритетность(4-5)'>
    <label for="img">Картинка перса</label><input type='file' name='img'>
    <input type='text' name='element_id' placeholder='элемент(1-Phis,2-Ice,3-Fire,4-Light,5-Wind,6-Quant,7-Imagine)'>
    <input type='text' name='path' placeholder='путь'>
    <label for="img_path">Картинка пути</label><input type='file' name='img_path'>
    <label for="img_list">Картинка перса в таблице</label><input type='file' name='img_list'>
    <input type='submit' class='submit' name='button' value='добавить'>
</form>

<h3>а теперь эйдолоны</h3>
<form action='../components/add_eidolons.php' method='post' enctype="multipart/form-data">
    <input type='text' name='name' placeholder='имя'>
    <input type='text' name='rare' placeholder='раритетность(4-5)'>
    <label for="img">Картинка перса</label><input type='file' name='img'>
    <input type='text' name='element_id' placeholder='элемент(1-Phis,2-Ice,3-Fire,4-Light,5-Wind,6-Quant,7-Imagine)'>
    <input type='text' name='path' placeholder='путь'>
    <label for="img_path">Картинка пути</label><input type='file' name='img_path'>
    <label for="img_list">Картинка перса в таблице</label><input type='file' name='img_list'>
    <input type='submit' class='submit' name='button' value='добавить'>
</form>
-->


<!-- конусы -->
<hr><br><hr><h1>Конусы</h1>
<h3>добавить световой конус?</h3>
<form action='../components/addLightcone.php' method='post' enctype="multipart/form-data">
    <input type='text' name='name' placeholder='название'>
    <label for="cone_img">Изображение конуса</label><input type='file' name='cone_img'>
    <input type='text' name='rare' placeholder='редкость (3-5)'>
    <input type='text' name='path' placeholder='путь'>
    <label for="img_path">Изображение пути</label><input type='file' name='img_path'>
    <input type='text' name='hp' placeholder='hp'>
    <input type='text' name='atk' placeholder='atk'>
    <input type='text' name='def' placeholder='def'>
    <input type='text' name='ability' placeholder='описание способности'>
    <input type='text' name='description' placeholder='описание конуса'>
    <input type='submit' class='submit' name='button' value='добавить'>
</form>

<!-- артефакты 
<hr><br><hr><h1>Реликвии</h1>
<h3>добавить сет артов?</h3>
<form action='../components/news_refresh.php' method='post'>
    <input type='text' name='id_old' placeholder='id той, что заменяется'>
    <input type='text' name='id_new' placeholder='id той, с которой возьмется инфа'>
    <input type='submit' class='submit' name='button' value='заменить'>
</form> -->

<div class="end"></div>
</body>
</html>