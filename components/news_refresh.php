<?php
include "core.php";
if (!isset($_POST['id']) || !isset($_POST['desc']) || !isset($_POST['href']) || empty($_FILES['img']) ||
        $_POST['id']=="" || $_POST['desc']=="" || $_POST['href']=="" || $_FILES['img']['name']=="") {
    $_SESSION['error']="Не все значения для изменения новости заданы";
} else {
    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $href = $_POST['href'];
    $img = $_FILES['img'];
    $res = $connect -> query("UPDATE `news_card` SET `short_desc` = '$desc', 
        `img` = '{$img['name']}', `href`='$href' WHERE `id` = '$id'");
}

if (!isset($_POST['id_old']) || !isset($_POST['id_new']) ||
        $_POST['id_old']=="" || $_POST['id_new']=="") {
    $_SESSION['error']="Не все значения для замены новости заданы (для замены, а не изменения)";
} else {
    $id_old = $_POST['id_old'];
    $id_new = $_POST['id_new'];
    $res1 = $connect -> query("SELECT * FROM `news_card` WHERE `id` = '$id_new'");
    $res_ar = mysqli_fetch_assoc($res1);
    $id1 = $res_ar['id'];
    $desc1 = $res_ar['short_desc'];
    $img1 = $res_ar['img'];
    $href1 = $res_ar['href'];
    $result = $connect -> query("UPDATE `news_card` SET `short_desc` = '$desc1', 
        `img` = '$img1', `href`='$href1' WHERE `id` = '$id_old'");
    $_SESSION['error']="замена новости прошла успешно";
}

header("Location: ../pages/admin.php");
?>