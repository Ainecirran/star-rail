<?php
include_once "../components/header.php";

if (!(isset($_SESSION['user'])) || ($_SESSION['user']!="admin")) {
    header("Location: ../index.php");
}

$result = $connect -> query("SELECT * FROM `news_card`");
$res = mysqli_fetch_array($result);
?>

<form action='../components/news_refresh.php' method='post' enctype="multipart/form-data">
    <input type='hidden' name='id' value="<?php echo $_POST['id']; ?>">
    <input type='text' name='desc' placeholder='описание' value="<?php echo $res['short_desc']; ?>">
    <input type='text' name='href' placeholder='ссылка (в виде - character.php?id=1)' value="<?php echo $res['href']; ?>">
    <input type='file' name='img'>
    <label for="img">текущая картинка: <?php echo $res['img']; ?></label>
    <input type='submit' class='submit' name='button' value='изменить'>
</form>

</body>
</html>